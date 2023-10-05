package com.phytagoras.myapplication.ui;

import androidx.lifecycle.MutableLiveData;
public class ViewModels extends androidx.lifecycle.ViewModel {

    public MutableLiveData<String> username = new MutableLiveData<>();
    public MutableLiveData<String> pass = new MutableLiveData<>();
    public MutableLiveData<Integer> okToLogin = new MutableLiveData<>();
    public String hardPassword = "Admin123";

    public void submit(){
        if(pass.getValue().equals(hardPassword)){
            okToLogin.setValue(1);
        } else {
            okToLogin.setValue(2);
        }
    }

}
