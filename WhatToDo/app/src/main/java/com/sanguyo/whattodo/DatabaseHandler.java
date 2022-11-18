package com.sanguyo.whattodo;

import android.annotation.SuppressLint;
import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.List;

public class DatabaseHandler extends SQLiteOpenHelper {
    private static final String DB_NAME = "task_database";
    private static final String DB_TASK_TABLE = "table_task";

    DatabaseHandler(Context context){
        super(context, DB_NAME, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String task_table =
                "CREATE TABLE " + DB_TASK_TABLE + "(" +
                        "id INTEGER PRIMARY KEY AUTOINCREMENT," +
                        "title TEXT," +
                        "content TEXT)";
        db.execSQL(task_table);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVer, int newVer) {
        db.execSQL("DROP TABLE IF EXISTS " + DB_TASK_TABLE);
        onCreate(db);
    }
    public boolean insert(Tasks task) {
        SQLiteDatabase db = this.getWritableDatabase();

        ContentValues taskValues = new ContentValues();

        taskValues.put("title", task.title);
        taskValues.put("content", task.content);

        db.insert(DB_TASK_TABLE, null, taskValues);
        return true;
    }
    public boolean update(Tasks task) {
        ContentValues taskValues = new ContentValues();
        taskValues.put("title", task.title);
        taskValues.put("content", task.content);

        SQLiteDatabase db = this.getWritableDatabase();
        return db.update("table_task", taskValues,"id="+task.id, null) > 0;

    }
    public boolean delete(Tasks task) {
        SQLiteDatabase db = this.getWritableDatabase();

        return db.delete("table_task", "id="+task.id, null) > 0;

    }
    public List<Tasks> getTasks(){
        SQLiteDatabase db = this.getReadableDatabase();
        ArrayList<Tasks> arrayList = new ArrayList<>();
        Cursor cursor = db.rawQuery("SELECT * FROM table_task", null);
        cursor.moveToFirst();
        while(!cursor.isAfterLast()){
            @SuppressLint("Range") int taskID = Integer.parseInt(cursor.getString(cursor.getColumnIndex("id")));
            @SuppressLint("Range") String taskTitle = cursor.getString(cursor.getColumnIndex("title"));
            @SuppressLint("Range") String taskContent = cursor.getString(cursor.getColumnIndex("content"));
            Tasks task = new Tasks();
            task.id = taskID;
            task.title = taskTitle;
            task.content = taskContent;
            arrayList.add(task);
            cursor.moveToNext();
        }
        return arrayList;
    }
}
