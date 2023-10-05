package com.phytagoras.myapplication.ui;

import androidx.appcompat.app.AppCompatActivity;
import androidx.lifecycle.ViewModelProviders;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Toast;
import com.phytagoras.myapplication.databinding.ActivityLoginBinding;

public class LoginActivity extends AppCompatActivity {

    private ActivityLoginBinding binding;
    private ViewModels viewModel;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityLoginBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        viewModel = ViewModelProviders.of(this).get(ViewModels.class);
        binding.setViewModel(viewModel);

        viewModel.okToLogin.observe(this, value -> {
            if(value.equals(1)){
                startActivity(new Intent(this, DashboardActivity.class));
            } else if(value.equals(2)){
                Toast.makeText(this,"Password Invalid",Toast.LENGTH_SHORT).show();
            }
        });
    }
}