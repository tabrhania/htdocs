package com.example.tampilan_mobile;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class AboutActivity extends AppCompatActivity {

    ListView listviewAbout;
    String language[] = {"Hubungi Kami","Ketentuan Toko"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_about);
        listviewAbout = (ListView)findViewById(R.id.listviewAbout);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,language);
        listviewAbout.setAdapter(adapter);

        //register the listview for context menu
        registerForContextMenu(listviewAbout);
    }
}
