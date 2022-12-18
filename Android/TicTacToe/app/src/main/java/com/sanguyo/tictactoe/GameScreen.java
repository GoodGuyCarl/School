package com.sanguyo.tictactoe;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Typeface;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.dialog.MaterialAlertDialogBuilder;

import java.io.IOException;

public class GameScreen extends AppCompatActivity {
    private final Button[][] buttons = new Button[5][5];
    TextView player1Name, player2Name, tvPlayer1Score, tvPlayer2Score;
    private boolean player1Turn = true;
    private int roundCount, player1Score, player2Score;
    Button reset, rules;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_game);
        player1Name = (TextView) findViewById(R.id.tvPlayer1Name);
        player2Name = (TextView) findViewById(R.id.tvPlayer2Name);
        tvPlayer1Score = (TextView) findViewById(R.id.tvPlayer1Score);
        tvPlayer2Score = (TextView) findViewById(R.id.tvPlayer2Score);
        reset = (Button) findViewById(R.id.resetButton);
        rules = (Button) findViewById(R.id.rulesButton);
        Intent intent = getIntent();
        player1Name.setText(intent.getStringExtra("player1Name"));
        player2Name.setText(intent.getStringExtra("player2Name"));
        reset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                resetGame();
            }
        });

        for (int i = 0; i < 5; i++) {
            for (int j = 0; j < 5; j++) {
                String buttonId = "button" + (i + 1) + "_" + (j + 1);
                int resId = getResources().getIdentifier(buttonId, "id", getPackageName());
                buttons[i][j] = (Button) findViewById(resId);
                buttons[i][j].setOnClickListener(new View.OnClickListener() {
                    @SuppressLint({"Range", "NewApi"})
                    @Override
                    public void onClick(View v) {
                        Button button = (Button) v;

                        if (!button.getText().toString().equals("")) {
                            return;
                        }

                        if (player1Turn) {
                            button.setText("X");
                            button.setTextSize(36);
                        } else {
                            button.setText("O");
                            button.setTextSize(36);
                        }

                        roundCount++;

                        if (checkForWin()) {
                            if (player1Turn) {
                                player1Wins();
                                player1Score++;
                                tvPlayer1Score.setText(String.valueOf(player1Score));
                            } else {
                                player2Wins();
                                player2Score++;
                                tvPlayer2Score.setText(String.valueOf(player2Score));
                            }
                        } else if (roundCount == 25) {
                            draw();
                        } else {
                            player1Turn = !player1Turn;
                        }
                    }
                });
            }
        }

        rules.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(GameScreen.this, RulesActivity.class));
            }
        });
    }

    private boolean checkForWin() {
        String[][] field = new String[5][5];

        for (int i = 0; i < 5; i++) {
            for (int j = 0; j < 5; j++) {
                field[i][j] = buttons[i][j].getText().toString();
            }
        }

        // Check for 4-in-a-row horizontally
        for (int i = 0; i < 5; i++) {
            for (int j = 0; j < 2; j++) {
                if (field[i][j].equals(field[i][j+1])
                        && field[i][j].equals(field[i][j+2])
                        && field[i][j].equals(field[i][j+3])
                        && !field[i][j].equals("")) {
                    return true;
                }
            }
        }

        // Check for 4-in-a-row vertically
        for (int i = 0; i < 2; i++) {
            for (int j = 0; j < 5; j++) {
                if (field[i][j].equals(field[i+1][j])
                        && field[i][j].equals(field[i+2][j])
                        && field[i][j].equals(field[i+3][j])
                        && !field[i][j].equals("")) {
                    return true;
                }
            }
        }

        // Check for 4-in-a-row diagonally (top left to bottom right)
        for (int i = 0; i < 2; i++) {
            for (int j = 0; j < 2; j++) {
                if (field[i][j].equals(field[i+1][j+1])
                        && field[i][j].equals(field[i+2][j+2])
                        && field[i][j].equals(field[i+3][j+3])
                        && !field[i][j].equals("")) {
                    return true;
                }
            }
        }

        // Check for 4-in-a-row diagonally (top right to bottom left)
        for (int i = 0; i < 2; i++) {
            for (int j = 4; j > 2; j--) {
                if (field[i][j].equals(field[i+1][j-1])
                        && field[i][j].equals(field[i+2][j-2])
                        && field[i][j].equals(field[i+3][j-3])
                        && !field[i][j].equals("")) {
                    return true;
                }
            }
        }

        // Return false if none of the win conditions are met
        return false;
    }

    private void draw() {
        Toast.makeText(this, "Draw!", Toast.LENGTH_SHORT).show();
        resetGame();
    }

    private void player1Wins() {
        Toast.makeText(this, player1Name.getText().toString()+" wins!", Toast.LENGTH_SHORT).show();
        resetGame();
    }

    private void player2Wins() {
        Toast.makeText(this, player2Name.getText().toString()+" wins!", Toast.LENGTH_SHORT).show();
        resetGame();
    }

    private void resetGame() {
        for (int i = 0; i < 5; i++) {
            for (int j = 0; j < 5; j++) {
                buttons[i][j].setText("");
            }
        }
        roundCount = 0;
        player1Turn = true;
    }



}
