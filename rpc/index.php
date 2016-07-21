<?php
if(!$_GET['grpc'] = 'y') {
    return false;
}
$result = array();
if($_POST['handshake'] != 'carolina_kerry') {
	$result = array(
		'error' => 'Authentication error!'
	);
}

if(!$result['error']) {
	if($_POST['getConfig']) {
		$confs = glob('class/*.php');
		foreach($confs as $conf) {
			include($conf);
			$className = substr(substr($conf, 6), 0, -4);
			$controller = new $className();
			$result[get_class($controller)] = get_class_methods($controller);
		}
	}
	
	if(count($result) == 0) {
		if(is_file('class/'.$_POST['controller'].'.php')) {
			include('class/'.$_POST['controller'].'.php');
			$class = new $_POST['controller']();
			if($_POST['data']) {
				$class->data = $_POST['data'];
			}
			if(method_exists($class, $_POST['action'])) {
				$result = $class->$_POST['action']();
			} else {
				$result = array(
					'error' => 'Action '.$_POST['action']. ' not found!',
				);
			}
		} else {
			$result = array(
				'error' => 'Controller '. $_POST['controller'].' not found!',
			);
		}
	}
}

echo json_encode($result);