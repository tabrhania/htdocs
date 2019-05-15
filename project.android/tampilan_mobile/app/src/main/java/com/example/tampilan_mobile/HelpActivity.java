package com.example.tampilan_mobile;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class HelpActivity extends AppCompatActivity {

    ListView listviewHelp;
    String language[] = {"Info Aplikasi"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_help);
        listviewHelp = (ListView)findViewById(R.id.listviewHelp);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,language);
        listviewHelp.setAdapter(adapter);

        //register the listview for context menu
        registerForContextMenu(listviewHelp);
    }
}
