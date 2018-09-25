<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/************************************************************************/
/***Exporta dados para o Excel*******************************************/
/***Desenvolvido por Luiz Claudio Coutinho Cruz**************************/
/***Site lccoutinho.info*************************************************/
/***Controle de versão kd.1.0.0******************************************/
/***Atualizado em 21/07/2016*********************************************/
/************************************************************************/
class Exporta_Excel {
	var $CI;
/************************************************************************/
	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('excel');
	}
/************************************************************************/
	public function exportaContatoAtividade($data){
		$obj = $data['obj'];

		// As várias propriedades do documento que podemos definir

		$this->CI->excel
			->getProperties()
			->setCreator("App Macaetec")
			->setLastModifiedBy("Modificado por...")
			->setTitle("Listagens dos Contatos")
			->setSubject("Contatos");

		// Inserir dados nas células A1 e A2
		$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Nome')
			->setCellValue('B1', 'Email');

		//Loop para popular o arquivo
		$i=2;
		foreach ($obj as $rw){
			$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $rw->nome)
			->setCellValue('B'.$i, $rw->email);
			$i++;
			foreach($rw->contato->get() as $c){
				$this->CI->excel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $c->nome)
				->setCellValue('B'.$i, $c->email);
				$i++;
			}
		}

		// Definir a largura da coluna A para automático/auto-ajustar
		$this->CI->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->CI->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

		// Formatar a célula A1 a negrito
		$this->CI->excel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);

		// Indicação da criação do ficheiro
		$objWriter = PHPExcel_IOFactory::createWriter($this->CI->excel, 'Excel5');

		// Encaminhar o ficheiro resultante para abrir no browser ou fazer download
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Lista_Contatos.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	}
/************************************************************************/
	public function extrairEmailEmpresa(){
		$o = new Empresa();
		$obj = $o
				->where('email <>','')
				->get();

		// As várias propriedades do documento que podemos definir

		$this->CI->excel
			->getProperties()
			->setCreator("App Macaetec")
			->setLastModifiedBy("Modificado por...")
			->setTitle("Listagens de E-mail das Empresas")
			->setSubject("Contatos");

		// Inserir dados nas células A1 e A2
		$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Nome')
			->setCellValue('B1', 'Email');

		//Loop para popular o arquivo
		$i=2;
		foreach ($obj as $rw){
			$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $rw->nome)
			->setCellValue('B'.$i, $rw->email);
			$i++;
		}

		// Definir a largura da coluna A para automático/auto-ajustar
		$this->CI->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->CI->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

		// Formatar a célula A1 a negrito
		$this->CI->excel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);

		// Indicação da criação do ficheiro
		$objWriter = PHPExcel_IOFactory::createWriter($this->CI->excel, 'Excel5');

		// Encaminhar o ficheiro resultante para abrir no browser ou fazer download
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Lista_EmailEmpresas.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	}
/************************************************************************/
	public function extrairEmailContato(){
		$o = new Contato();
		$obj = $o
				->include_related('departamento','nome')
				->where(array('email <>' =>'','idExportar'=>1))
				->where_not_in_related_departamento('id',array(1))
				->get();

		// As várias propriedades do documento que podemos definir

		$this->CI->excel
			->getProperties()
			->setCreator("App Macaetec")
			->setLastModifiedBy("Modificado por...")
			->setTitle("Listagens de E-mail dos Contatos")
			->setSubject("Contatos");

		// Inserir dados nas células A1 e A2
		$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Nome')
			->setCellValue('B1', 'Email')
			->setCellValue('C1', 'Departamento');

		//Loop para popular o arquivo
		$i=2;
		foreach ($obj as $rw){
			$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $rw->nome)
			->setCellValue('B'.$i, $rw->email)
			->setCellValue('C'.$i, $rw->departamento_nome);
			$i++;
		}

		// Definir a largura da coluna A para automático/auto-ajustar
		$this->CI->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->CI->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->CI->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

		// Formatar a célula A1 a negrito
		$this->CI->excel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);

		// Indicação da criação do ficheiro
		$objWriter = PHPExcel_IOFactory::createWriter($this->CI->excel, 'Excel5');

		// Encaminhar o ficheiro resultante para abrir no browser ou fazer download
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Lista_EmailContatos.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	}
/************************************************************************/
	public function extrairEmailCompra(){
		$o = new Contato();
		$obj = $o
				->include_related('departamento','nome')
				->where(array('email <>' =>'','idExportar'=>1))
				->where_in_related_departamento('id',array(1))
				->get();

		// As várias propriedades do documento que podemos definir

		$this->CI->excel
			->getProperties()
			->setCreator("App Macaetec")
			->setLastModifiedBy("Modificado por...")
			->setTitle("Listagens de E-mail dos Contatos")
			->setSubject("Contatos");

		// Inserir dados nas células A1 e A2
		$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Nome')
			->setCellValue('B1', 'Email')
			->setCellValue('C1', 'Departamento');

		//Loop para popular o arquivo
		$i=2;
		foreach ($obj as $rw){
			$this->CI->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $rw->nome)
			->setCellValue('B'.$i, $rw->email)
			->setCellValue('C'.$i, $rw->departamento_nome);
			$i++;
		}

		// Definir a largura da coluna A para automático/auto-ajustar
		$this->CI->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->CI->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->CI->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

		// Formatar a célula A1 a negrito
		$this->CI->excel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);

		// Indicação da criação do ficheiro
		$objWriter = PHPExcel_IOFactory::createWriter($this->CI->excel, 'Excel5');

		// Encaminhar o ficheiro resultante para abrir no browser ou fazer download
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Lista_EmailCompra.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	}
/************************************************************************/
}