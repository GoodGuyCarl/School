package com.sanguyo.passwordgenerator;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

import android.annotation.SuppressLint;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;


public class RandomPasswordGenerator {
    private static final String CHAR_LIST = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?";
    private static final int RANDOM_STRING_LENGTH = 8;
    private Random random;
    private StringBuilder randomString;
    private SQLiteDatabase db;
    public RandomPasswordGenerator(Context context) {
        random = new Random();
        randomString = new StringBuilder();

        // Initialize the SQLite database
        SQLiteOpenHelper helper = new SQLiteOpenHelper(context, "my_database", null, 1) {
            @Override
            public void onCreate(SQLiteDatabase db) {
                db.execSQL("CREATE TABLE passwords (" +
                        "id INTEGER PRIMARY KEY AUTOINCREMENT," +
                        "password TEXT)");
            }

            @Override
            public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
                db.execSQL("DROP TABLE IF EXISTS passwords");
                onCreate(db);
            }
        };
        db = helper.getWritableDatabase();
    }
    public String generateRandomPassword() {
        randomString = new StringBuilder("");
        for (int i = 0; i < RANDOM_STRING_LENGTH; i++) {
            int number = random.nextInt(CHAR_LIST.length());
            char ch = CHAR_LIST.charAt(number);
            randomString.append(ch);
        }
        return randomString.toString();
    }
    public void insertPassword(String password) {
        db.execSQL("INSERT INTO passwords (password) VALUES (?)", new String[]{password});
    }
    public void deletePasswords() {
        db.execSQL("DELETE FROM passwords");
    }
    public List<Passwords> read() {
        List<Passwords> passwords = new ArrayList<Passwords>();
        Cursor c = db.rawQuery("SELECT password FROM passwords", null);
        if (c.moveToFirst()) {
            do {
                @SuppressLint("Range") String password = c.getString(c.getColumnIndex("password"));
                Passwords pw = new Passwords();
                pw.password = password;
                passwords.add(pw);

            } while (c.moveToNext());
        }
        c.close();
        return passwords;
    }
}
