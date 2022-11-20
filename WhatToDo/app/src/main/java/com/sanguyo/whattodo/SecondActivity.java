package com.sanguyo.whattodo;

import androidx.appcompat.app.AppCompatActivity;
import androidx.viewpager.widget.ViewPager;

import android.annotation.SuppressLint;
import android.app.ActionBar;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.res.Configuration;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Typeface;
import android.os.Bundle;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.dialog.MaterialAlertDialogBuilder;
import com.google.android.material.divider.MaterialDivider;
import com.google.android.material.textfield.TextInputEditText;

import org.w3c.dom.Text;

import java.sql.SQLData;
import java.util.ArrayList;
import java.util.List;

public class SecondActivity extends AppCompatActivity {
    Button btnAdd, btnUpdate, btnDelete;
    LinearLayout layout;

    public void fetchAll() {
        Context context = getApplicationContext();
        LinearLayout layout = (LinearLayout) findViewById(R.id.tasks_layout);
        layout.removeAllViews();
        List<Tasks> tasks = new DatabaseHandler(context).getTasks();
        int nightModeFlags = getApplicationContext().getResources().getConfiguration().uiMode & Configuration.UI_MODE_NIGHT_MASK;
        if (tasks.size() > 0) {
            for (Tasks task : tasks) {
                int id = task.id;
                String title = task.title;
                String content = task.content;
                String tag = task.tag;

                TextView tvTaskID = new TextView(context);
                tvTaskID.setText(String.valueOf(id));
                tvTaskID.setPadding(8, 8, 0, 0);


                TextView tvTitle = new TextView(context);
                tvTitle.setText(title);
                tvTitle.setTextSize(16);
                tvTitle.setTypeface(getResources().getFont(R.font.poppins_bold));
                tvTitle.setPadding(0, 8, 0, 0);
                tvTitle.setLayoutParams(layout.getLayoutParams());
                tvTitle.setTextAlignment(TextView.TEXT_ALIGNMENT_CENTER);

                TextView tvContent = new TextView(context);
                tvContent.setText(content);
                tvContent.setLayoutParams(layout.getLayoutParams());
                tvContent.setTypeface(getResources().getFont(R.font.poppins));
                tvContent.setTextAlignment(TextView.TEXT_ALIGNMENT_CENTER);
                tvContent.setGravity(Gravity.CENTER);

                TextView tvTag = new TextView(context);
                tvTag.setText(tag);
                tvTag.setTextSize(8);
                tvTag.setTypeface(getResources().getFont(R.font.poppins));
                tvTag.setTextAlignment(TextView.TEXT_ALIGNMENT_CENTER);
                tvTag.setLayoutParams(layout.getLayoutParams());

                if (nightModeFlags == Configuration.UI_MODE_NIGHT_YES) {
                    tvTaskID.setTextColor(this.getResources().getColor(R.color.white));
                    tvTitle.setTextColor(this.getResources().getColor(R.color.headline_night));
                    tvContent.setTextColor(this.getResources().getColor(R.color.white));
                    tvTag.setTextColor(this.getResources().getColor(R.color.gray_night));
                } else {
                    tvTaskID.setTextColor(this.getResources().getColor(R.color.black));
                    tvTitle.setTextColor(this.getResources().getColor(R.color.headline));
                    tvContent.setTextColor(this.getResources().getColor(R.color.black));
                    tvTag.setTextColor(this.getResources().getColor(R.color.gray_day));

                }

                layout.addView(tvTaskID);
                layout.addView(tvTitle);
                layout.addView(tvContent);
                layout.addView(tvTag);

            }
        }

    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);
        layout = (LinearLayout) findViewById(R.id.tasks_layout);
        btnAdd = (Button) findViewById(R.id.btnAdd);
        btnDelete = (Button) findViewById(R.id.btnDelete);
        btnUpdate = (Button) findViewById(R.id.btnUpdate);
        fetchAll();

        btnAdd.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                final Context context = view.getRootView().getContext();
                LayoutInflater inflater = (LayoutInflater)
                        context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
                final View dialogView = inflater.inflate(R.layout.form, null, false);
                final TextInputEditText inputTitle = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextTitle);
                final TextInputEditText inputContent = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextContent);
                final TextInputEditText inputTag = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextTag);

                new MaterialAlertDialogBuilder(context).setView(dialogView)
                        .setTitle("Create Task")
                        .setPositiveButton("ADD", new DialogInterface.OnClickListener() {
                            @SuppressLint("NewApi")
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {
                                String taskTitle = String.valueOf(inputTitle.getText());
                                String taskContent = String.valueOf(inputContent.getText());
                                String taskTag = String.valueOf(inputTag.getText());
                                Tasks taskTable = new Tasks();
                                taskTable.title = taskTitle;
                                taskTable.content = taskContent;
                                taskTable.tag = taskTag;

                                fetchAll();

                                boolean result = new DatabaseHandler(context).insert(taskTable);

                                if (result) {
                                    Toast.makeText(context, "Task created", Toast.LENGTH_LONG).show();
                                    fetchAll();
                                } else {
                                    Toast.makeText(context, "Task creation failed!", Toast.LENGTH_LONG).show();
                                    fetchAll();
                                }
                            }
                        }).show();

            }
        });
        btnUpdate.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                final Context context = view.getRootView().getContext();
                LayoutInflater inflater = (LayoutInflater)
                        context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
                final View dialogView = inflater.inflate(R.layout.form_withid, null, false);
                final TextInputEditText inputID = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextID);
                final TextInputEditText inputTitle = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextTitle);
                final TextInputEditText inputContent = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextContent);
                final TextInputEditText inputTag = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextTag);

                new MaterialAlertDialogBuilder(context).setView(dialogView)
                        .setTitle("Update Task")
                        .setPositiveButton("UPDATE", new DialogInterface.OnClickListener() {
                            @SuppressLint("NewApi")
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {
                                int taskID = Integer.parseInt(String.valueOf(inputID.getText()));
                                String taskTitle = String.valueOf(inputTitle.getText());
                                String taskContent = String.valueOf(inputContent.getText());
                                String tagContent = String.valueOf(inputTag.getText());
                                Tasks taskTable = new Tasks();
                                taskTable.id = taskID;
                                taskTable.title = taskTitle;
                                taskTable.content = taskContent;
                                taskTable.tag = tagContent;

                                boolean result = new DatabaseHandler(context).update(taskTable);
                                if (result) {
                                    Toast.makeText(context, "Task updated!", Toast.LENGTH_LONG).show();
                                    fetchAll();
                                } else {
                                    Toast.makeText(context, "Task update failed!", Toast.LENGTH_LONG).show();
                                    fetchAll();
                                }
                            }
                        }).show();

            }
        });
        btnDelete.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                final Context context = view.getRootView().getContext();
                LayoutInflater inflater = (LayoutInflater)
                        context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
                final View dialogView = inflater.inflate(R.layout.form_onlyid, null, false);
                final TextInputEditText inputID = (TextInputEditText)
                        dialogView.findViewById(R.id.editTextID);

                new MaterialAlertDialogBuilder(context).setView(dialogView)
                        .setTitle("Delete Task")
                        .setPositiveButton("DELETE", new DialogInterface.OnClickListener() {
                            @SuppressLint("NewApi")
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {
                                int taskID = Integer.parseInt(String.valueOf(inputID.getText()));
                                Tasks taskTable = new Tasks();
                                taskTable.id = taskID;

                                boolean result = new DatabaseHandler(context).delete(taskTable);
                                if (result) {
                                    Toast.makeText(context, "Task deleted", Toast.LENGTH_LONG).show();
                                    fetchAll();
                                } else {
                                    Toast.makeText(context, "Task deletion failed!", Toast.LENGTH_LONG).show();
                                    fetchAll();
                                }
                            }
                        }).show();

            }
        });
    }
}