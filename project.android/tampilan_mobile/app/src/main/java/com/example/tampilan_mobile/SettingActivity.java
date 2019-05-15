package com.example.tampilan_mobile;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class SettingActivity extends AppCompatActivity {

    ListView listviewSetting;
    String language[] = {"Akun","Bahasa","Riwayat Pembelian","Keranjang"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_setting);
        listviewSetting = (ListView)findViewById(R.id.listviewSetting);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,language);
        listviewSetting.setAdapter(adapter);

        //register the listview for context menu
        registerForContextMenu(listviewSetting);
    }
}
