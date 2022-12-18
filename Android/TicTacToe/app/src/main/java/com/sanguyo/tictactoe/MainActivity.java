package com.sanguyo.tictactoe;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    Button start;
    EditText player1Name, player2Name;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        start = (Button) findViewById(R.id.btnStart);

        player1Name = (EditText) findViewById(R.id.editTextPlayer1Name);
        player2Name = (EditText) findViewById(R.id.editTextPlayer2Name);
        start.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final String p1name = player1Name.getText().toString();
                final String p2name = player2Name.getText().toString();
                if (p1name.isEmpty() || p2name.isEmpty()){
                    Toast.makeText(MainActivity.this, "Please enter the player names", Toast.LENGTH_SHORT).show();
                }
                else {
                    Intent intent = new Intent(MainActivity.this, GameScreen.class);
                    intent.putExtra("player1Name", p1name);
                    intent.putExtra("player2Name", p2name);
                    startActivity(intent);
                }
            }
        });
    }
}