<?php
// untuk menampilkan tingkat kelas dan jurusan kelas by id
function tampilan_full_kelas_byid($id)
{
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('kelas');
    foreach ($result->result() as $c) {
        $stmt = $c->tingkat_kelas . ' ' . $c->jurusan_kelas; // Perbaiki bagian ini
        return $stmt;
    }
}
function nama_siswa($id)
{
    $ci =& get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_siswa', $id)->get('siswa');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_siswa; // Perbaiki bagian ini
        return $stmt;
    }
}
?>
