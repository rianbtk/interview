import 'package:flutter_crud_api/api/api.dart';
import 'package:flutter_crud_api/pages/update_user.dart';
import 'package:flutter_crud_api/pages/views.dart';
import 'package:flutter/material.dart';

import 'list_user.dart';

class Profile extends StatelessWidget {
  var avatar, fName, lName, email;
  Profile(this.avatar, this.fName, this.lName, this.email);

  void confirmDelete(context) {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          content: Text('Are you sure you want to delete this user?'),
          actions: <Widget>[
            ElevatedButton(
              child: Icon(Icons.cancel),
              onPressed: () => Navigator.of(context).pop(),
            ),
            ElevatedButton(
                child: Icon(Icons.check_circle),
                onPressed: () => {
                      deleteUser(context),
                      ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                        content: Text("Successfully Updated"),
                        backgroundColor: Colors.blue,
                      )),
                      Navigator.of(context).push(
                        MaterialPageRoute(
                          builder: (BuildContext context) => ListUser(),
                        ),
                      ),
                    }),
          ],
        );
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('$fName Profile'),
        centerTitle: true,
      ),
      body: Center(
        child: Padding(
          padding: const EdgeInsets.only(top: 38.0, left: 20, right: 20),
          child: Column(
            children: [
              ClipOval(
                child: Image(
                  image: NetworkImage(avatar),
                  height: 180,
                  width: 180,
                  fit: BoxFit.cover,
                ),
              ),
              SizedBox(
                height: 20,
              ),
              Text(
                'First Name: $fName',
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              Text(
                'Last Name: $lName',
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              Text(
                'Email: $email',
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              SizedBox(
                height: 60,
              ),
              Container(
                padding: EdgeInsets.all(15),
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10),
                    color: Colors.deepPurple),
                child: Button.TextButton(
                  text: 'Update User',
                  press: () {
                    Navigator.of(context).push(MaterialPageRoute(
                      builder: (context) => UpdateUserView(),
                    ));
                  },
                ),
              ),
              SizedBox(
                height: 20,
              ),
              Container(
                  padding: EdgeInsets.all(15),
                  decoration: BoxDecoration(
                      borderRadius: BorderRadius.circular(10),
                      color: Colors.deepPurple),
                child:RedButton.TextButton(
                  text: 'Delete User',
                  press: () {
                    confirmDelete(context);
                  },
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
