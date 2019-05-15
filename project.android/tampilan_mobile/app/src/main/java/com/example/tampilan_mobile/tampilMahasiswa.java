package com.example.tampilan_mobile;

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class tampilMahasiswa extends AppCompatActivity implements View.OnClickListener{

    private EditText editTextNim;
    private EditText editTextName;
    private EditText editTextUmur;
    private EditText editTextLahir;
    private EditText editTextIpk;

    private Button buttonUpdate;
    private Button buttonDelete;

    private String nim;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tampil_mahasiswa);
        Intent intent = getIntent();

        nim = intent.getStringExtra(konfigurasi.MHS_NIM);

        editTextNim = (EditText) findViewById(R.id.editTextNim);
        editTextName = (EditText) findViewById(R.id.editTextName);
        editTextUmur = (EditText) findViewById(R.id.editTextUmur);
        editTextLahir = (EditText) findViewById(R.id.editTextLahir);
        editTextIpk = (EditText) findViewById(R.id.editTextIpk);

        buttonUpdate = (Button) findViewById(R.id.buttonUpdate);
        buttonDelete = (Button) findViewById(R.id.buttonDelete);

        buttonUpdate.setOnClickListener(this);
        buttonDelete.setOnClickListener(this);

        editTextNim.setText(nim);

        getMahasiswa();
    }
    private void getMahasiswa(){
        class GetMahasiswa extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(tampilMahasiswa.this,"Fetching...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                showMahasiswa(s);
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam(konfigurasi.URL_GET_MHS,nim);
                return s;
            }
        }
        GetMahasiswa ge = new GetMahasiswa();
        ge.execute();
    }

    private void showMahasiswa(String json){
        try {
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(0);
            String nim = c.getString(konfigurasi.TAG_NIM);
            String name = c.getString(konfigurasi.TAG_NAMA);
            String umur = c.getString(konfigurasi.TAG_UMUR);
            String lahir = c.getString(konfigurasi.TAG_TEMPAT_LAHIR);
            String ipk = c.getString(konfigurasi.TAG_IPK);

            editTextNim.setText(nim);
            editTextName.setText(name);
            editTextUmur.setText(umur);
            editTextLahir.setText(lahir);
            editTextIpk.setText(ipk);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }


    private void updateMahasiswa(){
        final String nim = editTextNim.getText().toString().trim();
        final String name = editTextName.getText().toString().trim();
        final String umur = editTextUmur.getText().toString().trim();
        final String lahir = editTextLahir.getText().toString().trim();
        final String ipk = editTextIpk.getText().toString().trim();

        class UpdateMahasiswa extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(tampilMahasiswa.this,"Updating...","Wait...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(tampilMahasiswa.this,s,Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                HashMap<String,String> hashMap = new HashMap<>();
                hashMap.put(konfigurasi.KEY_MHS_NIM,nim);
                hashMap.put(konfigurasi.KEY_MHS_NAMA,name);
                hashMap.put(konfigurasi.KEY_MHS_UMUR,umur);
                hashMap.put(konfigurasi.KEY_MHS_LAHIR,lahir);
                hashMap.put(konfigurasi.KEY_MHS_IPK,ipk);

                RequestHandler rh = new RequestHandler();

                String s = rh.sendPostRequest(konfigurasi.URL_UPDATE_MHS,hashMap);

                return s;
            }
        }

        UpdateMahasiswa um = new UpdateMahasiswa();
        um.execute();
    }

    private void deleteMahasiswa(){
        class DeleteMahasiswa extends AsyncTask<Void,Void,String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(tampilMahasiswa.this, "Updating...", "Tunggu...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(tampilMahasiswa.this, s, Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam(konfigurasi.URL_DELETE_MHS, nim);
                return s;
            }
        }

        DeleteMahasiswa dm = new DeleteMahasiswa();
        dm.execute();
    }

    private void confirmDeleteMahasiswa(){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(this);
        alertDialogBuilder.setMessage("Apakah Kamu Yakin Ingin Menghapus Mahasiswa ini?");

        alertDialogBuilder.setPositiveButton("Ya",
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface arg0, int arg1) {
                        deleteMahasiswa();
                        startActivity(new Intent(tampilMahasiswa.this,TampilSemuaMhs.class));
                    }
                });

        alertDialogBuilder.setNegativeButton("Tidak",
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface arg0, int arg1) {

                    }
                });

        AlertDialog alertDialog = alertDialogBuilder.create();
        alertDialog.show();
    }

    @Override
    public void onClick(View v) {
        if(v == buttonUpdate){
            updateMahasiswa();
        }

        if(v == buttonDelete){
            confirmDeleteMahasiswa();
        }
    }
}
