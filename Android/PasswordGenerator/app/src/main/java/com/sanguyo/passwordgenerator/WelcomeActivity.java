package com.sanguyo.passwordgenerator;

import static android.content.pm.PackageManager.PERMISSION_DENIED;
import static android.content.pm.PackageManager.PERMISSION_GRANTED;

import androidx.appcompat.app.AppCompatActivity;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class WelcomeActivity extends AppCompatActivity {
    Button btn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_welcome);
        btn = (Button) findViewById(R.id.btn);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String permissions = Manifest.permission.WRITE_EXTERNAL_STORAGE;
                int requestCode = 1;
                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                    requestPermissions(new String[]{permissions}, requestCode);
                    int checkVal = getApplicationContext().checkCallingOrSelfPermission(permissions);
                    if (checkVal == PERMISSION_GRANTED) {
                        startActivity(new Intent(WelcomeActivity.this, MainActivity.class));
                        Toast.makeText(WelcomeActivity.this, "Welcome to Password Generator", Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });
    }
}