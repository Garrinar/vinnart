<?
	class oformlenja {
		
		public $data;
		public $config = array();
		public $db;
		
		public function __construct() {
			$this->getConfig();
			$lang = 'ua';
			include ($_SERVER['DOCUMENT_ROOT'].'/GTools/gfiledb.php');
			$this->db = new GFileDB($_SERVER['DOCUMENT_ROOT'].'/db/'.$lang.'/'.__class__.'.json');
		}
		
		public function getConfig($lang='ua') {
			if(count($this->config) == 0) {
				$table = __class__;
				$this->config = $this->db->data;
			}
			return $this->config;
		}
		
		public function updateTitle() {
			$this->db->data['images'][$this->data['id']]['title'] = $this->data['value'];
			return $this->db->commit();
		}
		
		public function updateDescription() {
			$this->db->data['top_text'] = nl2br($this->data['value']);
			return $this->db->commit();
		}
	}