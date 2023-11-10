package com.example.mobankmin.ui;

import androidx.lifecycle.ViewModelProvider;

import android.content.Intent;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import com.example.mobankmin.LoginActivity;
import com.example.mobankmin.R;

public class ProfileFragment extends Fragment {

    private ProfileViewModel mViewModel;
    private Button buttonLogout;

    public static ProfileFragment newInstance() {
        return new ProfileFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.profile_fragment, container, false);
        buttonLogout = view.findViewById(R.id.buttonLogout);

        buttonLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                logoutAndLoadLoginActivity();
            }
        });

        return view;
    }

    private void logoutAndLoadLoginActivity() {
        // Implement your logout logic here (e.g., clear user session).

        // Start the LoginActivity.
        Intent intent = new Intent(getActivity(), LoginActivity.class);
        startActivity(intent);

        // Finish the ProfileFragment.
        getActivity().finish();
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = new ViewModelProvider(this).get(ProfileViewModel.class);
        // TODO: Use the ViewModel
    }

}