package com.example.tampilan_mobile;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Button;
import android.widget.EditText;
import android.os.AsyncTask;
import android.widget.Toast;

import java.util.HashMap;


public class MainActivity extends AppCompatActivity implements View.OnClickListener{

    //Dibawah ini merupakan perintah untuk mendefinikan View
    private EditText editTextNim;
    private EditText editTextName;
    private EditText editTextUmur;
    private EditText editTextLahir;
    private EditText editTextIpk;

    private Button buttonAdd;
    private Button buttonView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //Inisialisasi dari View
        editTextNim = (EditText) findViewById(R.id.editTextNim);
        editTextName = (EditText) findViewById(R.id.editTextName);
        editTextUmur = (EditText) findViewById(R.id.editTextUmur);
        editTextLahir = (EditText) findViewById(R.id.editTextLahir);
        editTextIpk = (EditText) findViewById(R.id.editTextIpk);

        buttonAdd = (Button) findViewById(R.id.buttonAdd);
        buttonView = (Button) findViewById(R.id.buttonView);

        //Setting listeners to button
        buttonAdd.setOnClickListener(this);
        buttonView.setOnClickListener(this);
        }

    //Dibawah ini merupakan perintah untuk Menambahkan Pegawai (CREATE)
    private void addMahasiswa(){

        final String nim = editTextNim.getText().toString().trim();
        final String name = editTextName.getText().toString().trim();
        final String umur = editTextUmur.getText().toString().trim();
        final String lahir = editTextLahir.getText().toString().trim();
        final String ipk = editTextIpk.getText().toString().trim();

        class AddMahasiswa extends AsyncTask<Void,Void,String>{

            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(MainActivity.this,"Menambahkan...","Tunggu...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(MainActivity.this,s,Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... v) {
                HashMap<String,String> params = new HashMap<>();
                params.put(konfigurasi.KEY_MHS_NIM,nim);
                params.put(konfigurasi.KEY_MHS_NAMA,name);
                params.put(konfigurasi.KEY_MHS_UMUR,umur);
                params.put(konfigurasi.KEY_MHS_LAHIR,lahir);
                params.put(konfigurasi.KEY_MHS_IPK,ipk);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostRequest(konfigurasi.URL_ADD, params);
                return res;
            }
        }

        AddMahasiswa am = new AddMahasiswa();
        am.execute();
    }

    @Override
    public void onClick(View v) {
        if(v == buttonAdd){
            addMahasiswa();
        }

        if(v == buttonView){
            startActivity(new Intent(this,TampilSemuaMhs.class));
        }
    }
    //        inflate the menu, add item to the action bar if it is present
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.option_menu, menu);
//        getMenuInflater().inflate(R.menu.option_menu,menu);
        return true;
    }

    public boolean onOptionsItemSelected(MenuItem item) {
            if (item.getItemId()==R.id.Setting) {
                startActivity(new Intent(this, SettingActivity.class));
            } else if (item.getItemId()==R.id.About) {
                startActivity(new Intent(this,AboutActivity.class));
            } else if (item.getItemId()==R.id.Help) {
                startActivity(new Intent(this, HelpActivity.class));
            }
            return true;
    }

    }
