package com.sanguyo.passwordgenerator;

import androidx.appcompat.app.AppCompatActivity;

import android.Manifest;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
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
        readPasswords();
        RandomPasswordGenerator generator = new RandomPasswordGenerator(this);
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
        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    savePassword();
                    Toast.makeText(MainActivity.this, "Passwords saved to sdcard/Downloads", Toast.LENGTH_SHORT).show();
                } catch (IOException e) {
                    Toast.makeText(MainActivity.this, e.getMessage(), Toast.LENGTH_SHORT).show();;
                }
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
    public void savePassword() throws IOException {
        File file = new File("sdcard/Download/", "password.txt");
        List<Passwords> passwordList = new RandomPasswordGenerator(this).read();
        FileOutputStream outputStream = new FileOutputStream(file);
        outputStream.write("Generated Passwords:\n".getBytes());
        for (Passwords p: passwordList) {
            String password = p.password;
            outputStream.write(password.getBytes());
            outputStream.write("\n".getBytes());
        }
        outputStream.close();
    }
}