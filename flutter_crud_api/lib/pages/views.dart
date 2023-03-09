import 'package:flutter_crud_api/pages/list_user.dart';
import 'package:flutter/material.dart';
import 'package:flutter/cupertino.dart';

//style
const colors = Colors.deepPurple;
const backColors = Color(0xff5f2bb6);
const bodyColor = Color(0xff5f2bb6);
const buttonText =
    TextStyle(fontSize: 18, fontWeight: FontWeight.bold, color: Colors.black);

//Button C
class Button extends StatelessWidget {
  var text;
  var press;

  Button.TextButton({required this.text, required this.press});
  @override
  Widget build(BuildContext context) {
    return newTextButton(context);
  }

  Widget newTextButton(context) {
    Size size = MediaQuery.of(context).size;
    return TextButton(
      child: Text(
        text,
        style: buttonText,
      ),
      onPressed: press,
    );
  }
}

//R Button
class RedButton extends StatelessWidget {
  var text;
  var press;

  RedButton.TextButton({required this.text, required this.press});
  @override
  Widget build(BuildContext context) {
    return newTextButton(context);
  }

  Widget newTextButton(context) {
    Size size = MediaQuery.of(context).size;
    return TextButton(
      child: Text(
        text,
        style: buttonText,
      ),
      onPressed: press,
    );
  }
}

//vies
class ViewsAppp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Happy Puppy',
      theme: ThemeData(
        primarySwatch: Colors.deepPurple,
      ),
      home: ListUser(),
    );
  }
}
