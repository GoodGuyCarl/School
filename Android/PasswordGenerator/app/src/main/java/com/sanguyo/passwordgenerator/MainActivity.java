package com.sanguyo.passwordgenerator;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.ClipData;
import android.content.ClipboardManager;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    LinearLayout layout;
    TextView generatedPasswords;
    Button generate, save, delete;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        layout = (LinearLayout) findViewById(R.id.passwordsLayout);
        generatedPasswords = (TextView) findViewById(R.id.textView);
        generate = (Button) findViewById(R.id.btnGenerate);
        save = (Button) findViewById(R.id.btnSave);
        delete = (Button) findViewById(R.id.btnDelete);
        RandomPasswordGenerator generator = new RandomPasswordGenerator(this);
        readPasswords();
        generate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String password = generator.generateRandomPassword();
                generator.insertPassword(password);
                readPasswords();
                Toast.makeText(getApplicationContext(), "Password generated", Toast.LENGTH_SHORT).show();
            }
        });
        delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                generator.deletePasswords();
                Toast.makeText(getApplicationContext(), "Passwords deleted", Toast.LENGTH_SHORT).show();
                readPasswords();
            }
        });
    }
    public void readPasswords(){
        layout.removeAllViews();
        List<Passwords> passwordsList = new RandomPasswordGenerator(this).read();
        if(passwordsList.size() > 0){
            for(Passwords p : passwordsList){
                String password = p.password;
                TextView passwordView = new TextView(this);
                passwordView.setText(password);
                passwordView.setTextAlignment(View.TEXT_ALIGNMENT_CENTER);
                passwordView.setPadding(8,8,8,8);
                layout.addView(passwordView);
            }
        }
    }
}