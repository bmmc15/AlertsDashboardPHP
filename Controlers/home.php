<?php

$timeframes = array(
	'5 minute',
	'15 minute',
	'1 hour',
	'4 hour',
	'1 day',
	'1 week'
);

$alertsHistory = $alertsManager->getListWhere("received_at >= CURDATE()");

date_default_timezone_set('Europe/Paris');
$timestamp = 'Y-m-d H:i:s';
$t=time();
$currentDate = date($timestamp,$t);
$currentDay = date('Y-m-d',$t);

function fd($object, $type = 'log')
{
    $types = array('log', 'debug', 'info', 'warn', 'error', 'assert');

    if (!in_array($type, $types)) {
        $type = 'log';
    }

    echo '
		<script type="text/javascript">
			console.'.$type.'('.json_encode($object).');
		</script>
	';
}

function checkAlerts($alerts, $symbol,$timeframe,$indicator)
{
	switch ($timeframe){
		case "5 minute":
			$timeframeInMinutes = 5;
			$timeframePeriod = '5';
			break;
		case "15 minute":
			$timeframeInMinutes = 15;
			$timeframePeriod = '15';
			break;
		case "1 hour":
			$timeframeInMinutes = 60;
			$timeframePeriod = '60';
			break;
		case "4 hour":
			$timeframeInMinutes = 240;
			$timeframePeriod = '240';
			break;
		case "1 day":
			$timeframeInMinutes = 1440;
			$timeframePeriod = 'D';
			break;
		case "1 week":
			$timeframeInMinutes = 10080;
			$timeframePeriod = 'W';
			break;
	}

	$now = new DateTime(); // Get current timestamp

	foreach ($alerts as $key => $value) 
	{
		$alert = $value->getFields();

        $alertMsg = json_decode($alert['payload']);

		// 1. Check Alert Symbol
        $cd1 = isset($alertMsg->symbol) && $alertMsg->symbol == $symbol;

        if($cd1)
        {
        	// 2. Check Alert Indicator
        	$cd2 = isset($alertMsg->indicator) && $alertMsg->indicator == $indicator;
        	if($cd2)
        	{
        		// 3. Check Alert Timeframe
        		$cd3 = isset($alertMsg->timeframe) && $alertMsg->timeframe == $timeframePeriod;
        		if($cd3)
        		{
        			// 4. Check If alert is not elapsed
					$alertTime = new DateTime($alert['received_at']); // Convert alert timestamp to DateTime

			        $difference = $now->getTimestamp() - $alertTime->getTimestamp();
			        fd("Difference in seconds = " . $difference);
			        $differenceInMinutes = $difference / 60;

			        $cd4 = $differenceInMinutes <= 2 * $timeframeInMinutes;

			        if($cd4)
			        {
			        	// 5. Check if alert is dull
        				$cd5 = $differenceInMinutes <= $timeframeInMinutes;
        				fd($cd5);
        				if(!$cd5)
        				{
        					if($alertMsg->action == 'buy')
	        					return 3;
	        				else
	        					return 4;
        				}
        				else
        				{
        					if($alertMsg->action == 'buy')
	        					return 1;
	        				else
	        					return 2;
        				}
			        }
        		}
        	}
        }
	}
	return 0;
}

include(dirname(__FILE__).'/../Views/home.php');
