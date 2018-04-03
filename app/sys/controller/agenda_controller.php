<?php

	namespace BenliTech\AgendaController;

	class Agenda{

		private $view_path;

		public function caregar_agenda($db){
			$query_caregar_lembretes=$db->query("SELECT * FROM agenda where estado_lembrete='activo';");
			$_SESSION["query_caregar_lembretes"]=$query_caregar_lembretes;			
			$this->view_path=dirname(__FILE__).'/../views/Agenda/agenda.php';
			include $this->view_path;
		}

		public function registar_lembrete($db,$lembrete){
			$date=date("Y-m-d");

			$query_registo_lembrete=$db->query("INSERT INTO agenda (lembrete,data_lembrete,estado_lembrete) values('$lembrete','$date','activo');");
			$Ag= new Agenda;
			$Ag->caregar_agenda($db);
		}

		public function desactivar_lembrete($db,$id_lembrete){	

			$query_registo_lembrete=$db->query("UPDATE agenda set estado_lembrete='desactivado' where id_lembrete='$id_lembrete';");
			
			echo json_encode(["value"=>$query_registo_lembrete]);
		}
		
		
	}


?>

