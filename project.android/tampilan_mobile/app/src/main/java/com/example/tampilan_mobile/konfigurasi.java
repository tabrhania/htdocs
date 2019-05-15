package com.example.tampilan_mobile;

public class konfigurasi {

    //Dibawah ini merupakan Pengalamatan dimana Lokasi Skrip CRUD PHP disimpan
    //membuat localhost maka alamatnya tertuju ke IP komputer
    //dimana File PHP tersebut berada
    //PENTING! JANGAN LUPA GANTI IP SESUAI DENGAN IP KOMPUTER DIMANA DATA PHP BERADA
    public static final String URL_ADD="http://192.168.1.8/pegawai/tambahMhs.php";
    public static final String URL_GET_ALL = "http://192.168.1.8/pegawai/tampilsemuaMhs.php";
    public static final String URL_GET_MHS = "http://192.168.1.8/pegawai/tampilMhs.php?nim=";
    public static final String URL_UPDATE_MHS = "http://192.168.1.8/pegawai/updateMhs.php";
    public static final String URL_DELETE_MHS = "http://192.168.1.8/pegawai/hapusMhs.php?nim=";

    //Dibawah ini merupakan Kunci yang akan digunakan untuk mengirim permintaan ke Skrip PHP
    public static final String KEY_MHS_NIM = "nim";
    public static final String KEY_MHS_NAMA = "name";
    public static final String KEY_MHS_UMUR = "umur";
    public static final String KEY_MHS_LAHIR = "tempat_lahir"; // variabel untuk tempat_lahir
    public static final String KEY_MHS_IPK = "IPK";

    //JSON Tags
    public static final String TAG_JSON_ARRAY="result";
    public static final String TAG_NIM = "nim";
    public static final String TAG_NAMA = "name";
    public static final String TAG_UMUR = "umur";
    public static final String TAG_TEMPAT_LAHIR = "tempat_lahir";
    public static final String TAG_IPK = "IPK";

    //NIM mahasiswa
    //mhs itu singkatan dari Mahasiswa
    public static final String MHS_NIM = "mhs_nim";
}
