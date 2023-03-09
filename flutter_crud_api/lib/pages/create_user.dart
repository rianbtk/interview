import 'package:flutter_crud_api/api/api.dart';
import 'package:flutter_crud_api/pages/list_user.dart';
import 'package:flutter_crud_api/pages/views.dart';
import 'package:flutter/material.dart';

class CreateUserView extends StatelessWidget {
  var name = TextEditingController();
  var job = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Create User'),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Container(
          padding: EdgeInsets.only(left: 25, right: 25, top: 40),
          child: Column(
            // mainAxisAlignment: MainAxisAlignment.center,
            // crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Padding(
                padding: const EdgeInsets.only(bottom: 25.0),
              ),
              //Name
              TextFormField(
                controller: name,
                style: TextStyle(fontSize: 20, color: Color(0xFF777878)),
                autofillHints: [AutofillHints.name],
                autofocus: false,
                decoration: InputDecoration(
                  labelText: 'Your Name',
                  hintText: 'Enter Your Name',
                  fillColor: Color(0xFFffffff),
                  filled: true,
                  labelStyle: TextStyle(fontSize: 16),
                  hintStyle: TextStyle(fontSize: 16),
                  prefixIcon: Icon(Icons.account_circle),
                  focusedBorder: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(15),
                    borderSide: BorderSide(color: colors, width: 2),
                  ),
                  enabledBorder: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(15),
                    borderSide: BorderSide(
                      color: bodyColor,
                      width: 2.0,
                    ),
                  ),
                  contentPadding: EdgeInsets.only(top: 10, left: 20),
                  //suffixIcon: name.text.length > 0 ? Icon(Icons.done) : Icon(Icons.pin)
                ),
              ),

              //Job
              Padding(
                padding: const EdgeInsets.only(top: 15, bottom: 15),
                child: TextFormField(
                  controller: job,
                  style: TextStyle(fontSize: 20, color: Color(0xFF777878)),
                  autofocus: false,
                  decoration: InputDecoration(
                    labelText: 'Your Job',
                    hintText: 'Enter Your Job',
                    fillColor: Color(0xFFffffff),
                    filled: true,
                    labelStyle: TextStyle(fontSize: 16),
                    hintStyle: TextStyle(fontSize: 16),
                    prefixIcon: Icon(Icons.account_circle),
                    focusedBorder: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(15),
                      borderSide: BorderSide(color: colors, width: 2),
                    ),
                    enabledBorder: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(15),
                      borderSide: BorderSide(
                        color: bodyColor,
                        width: 2.0,
                      ),
                    ),
                    contentPadding: EdgeInsets.only(top: 10, left: 20),
                    //suffixIcon: name.text.length > 0 ? Icon(Icons.done) : Icon(Icons.pin)
                  ),
                ),
              ),
              //Save
              const SizedBox(height: 40),
              Container(
                padding: EdgeInsets.all(15),
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10),
                    color: Colors.deepPurple),
                child: Button.TextButton(
                  text: 'Create User',
                  press: () {
                    if (name.text.isNotEmpty && job.text.isNotEmpty) {
                      CreateUser(name.text, job.text);
                      ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                        content: Text("Successfully Created"),
                        backgroundColor: Colors.deepPurpleAccent,
                      ));
                      Navigator.of(context).push(MaterialPageRoute(
                        builder: (context) => ListUser(),
                      ));
                    } else {
                      ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                        content: Text("Empty Field"),
                        backgroundColor: Colors.deepPurple,
                      ));
                    }
                  },
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
