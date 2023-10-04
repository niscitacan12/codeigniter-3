<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Keuangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true && $this->session->userdata('role') != 'keuangan') {
           redirect(base_url() . 'auth');
        }
	}

	public function index()
	{
		$this->load->view('keuangan/index');
	}

    // untuk pembayaran
    public function pembayaran()
    {
        $data['pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $this->load->view('keuangan/pembayaran', $data);
    }

    // untuk exspor
public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' =>
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' =>
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $style_row = [
            'font' => ['bold' => true],
            'alignment' => [
                'vertical' =>
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $sheet->setCellValue('A1', 'DATA SISWA');
        $sheet->mergeCells('A1:E1');
        $sheet
            ->getStyle('A1')
            ->getFont()
            ->setBold(true);

        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'NAMA');
        $sheet->setCellValue('C3', 'NISN');
        $sheet->setCellValue('D3', 'GENDER');
        $sheet->setCellValue('E3', 'KELAS');

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);

        $data = $this->m_model->getDataSiswa();

        $no = 1;
        $numrow = 4;
        foreach ($data as $data) {
            $sheet->setCellValue('A' . $numrow, $data->id_siswa);
            $sheet->setCellValue('B' . $numrow, $data->nama_siswa);
            $sheet->setCellValue('C' . $numrow, $data->nisn);
            $sheet->setCellValue('D' . $numrow, $data->gender);
            $sheet->setCellValue(
                'E' . $numrow,
                $data->tingkat_kelas . ' ' . $data->jurusan_kelas
            );

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet
            ->getPageSetup()
            ->setOrientation(
                \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE
            );

        $sheet->setTitle('DATA SISWA');

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );
        header('Content-Disposition: attachment; filename="Data Siswa.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }



    // untuk tambah pembayaran
    public function tambah_bayar()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $data['pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $this->load->view('keuangan/tambah_bayar', $data);
    }

    // untuk aksi tambah pembayaran
    public function aksi_tambah_bayar()
	{
		$data = [
			'id_siswa'         => $this->input->post('nama'),
			'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
			'total_pembayaran' => $this->input->post('total_pembayaran'),
			];
		$this->m_model->tambah_data('pembayaran', $data);
		redirect(base_url('Keuangan/pembayaran'));
	}

    // untuk ubah bayar
    public function ubah_bayar($id)
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $data['pembayaran'] = $this->m_model->get_by_id('pembayaran', 'id_siswa', $id)->result();
        $this->load->view('keuangan/ubah_bayar', $data);
    }

    // untuk aksi ubah bayar
    public function aksi_ubah_bayar()
    {
        $data = array (
                'id_siswa'         => $this->input->post('nama'),
                'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
                'total_pembayaran' => $this->input->post('total_pembayaran'),
        );
        $eksekusi=$this->m_model->ubah_data
        ('pembayaran', $data, array('id'=>$this->input->post('id')));
        if ($eksekusi)
        {
            $this->session->set_flashdata('sukses','berhasil');
            redirect(base_url('keuangan/pembayaran'));
        } else {
            $this->session->set_flashdata('error','gagal');
            redirect(base_url('keuangan/pembayaran/'.$this->input->post('id')));
        }
    }

    // untuk hapus 
    public function hapus($id)
    {
        $this->m_model->delete('pembayaran', 'id_siswa', $id);
        redirect(base_url('keuangan/pembayaran'));
    }

    // import
    public function import()
    {
      if(isset($_FILES["file"]["name"])) {
        $path = $_FILES["file"]["tmp_name"];
        $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        foreach($object->getWorksheetIterator() as $worksheet) {
          $highestRow = $worksheet->getHighestRow();
          $highestColumn = $worksheet->getHighestColumn();
          for($row=2; $row <= $highestRow; $row++) {
            $jenis_pembayaran = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $total_pembayaran = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $nisn = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
  
            $get_id_by_nisn = $this->m_model->get_by_nisn($nisn);
            $data = array(
              'jenis_pembayaran' => $jenis_pembayaran,
              'total_pembayaran' => $total_pembayaran,
              'id_siswa' => $get_id_by_nisn
            );
            $this->m_model->tambah_data('pembayaran', $data);
          }
        }
        redirect(base_url('keuangan/pembayaran'));
      } else {
        echo 'Invalid File';
      }
    }
}
?>    