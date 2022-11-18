import 'package:flutter/material.dart';

import '../data/Categories.dart';
import '../models/CategoriesChoice.dart';

class MoneyProvider extends ChangeNotifier {
  List ExpenseColor = List<Map<String, int>>.filled(
      Expensechoices.length, {'r': 255, 'g': 255, 'b': 255},
      growable: true);

  bool isDarkMode = false;
  int red = 255;
  int green = 255;
  int blue = 255;
  changeIsDarkMode() {
    isDarkMode = !isDarkMode;
    notifyListeners();
  }

  changeBackColor(int r, int g, int b, int index) {
    ExpenseColor = List<Map<String, int>>.filled(
        Expensechoices.length, {'r': 255, 'g': 255, 'b': 255});
    red = r;
    green = g;
    blue = b;
    ExpenseColor[index] = {'r': red, 'g': green, 'b': blue};
    notifyListeners();
  }

  setBackColor() {
    ExpenseColor = List<Map<String, int>>.filled(
        Expensechoices.length, {'r': 255, 'g': 255, 'b': 255});
    notifyListeners();
  }

  // TextEditingController textEditingController = TextEditingController();

  // List<Choice> ExpenseColor = [];
  //List<TaskModel> completeTasks = [];
  // List<TaskModel> inCompleteTasks = [];
  // getAllTasks() async {
  //   allTasks = await DbHelper.dbHelper.getAllTasks();
  //   completeTasks = allTasks.where((element) => element.isComplete!).toList();
  //   inCompleteTasks =
  //       allTasks.where((element) => !element.isComplete!).toList();
  //   notifyListeners();
  // }

  // insertNewTask() async {
  //   TaskModel taskModel =
  //       TaskModel(title: textEditingController.text, isComplete: false);
  //   textEditingController.clear();
  //   await DbHelper.dbHelper.insertNewTask(taskModel);
  //   getAllTasks();
  // }

  // deleteTask(TaskModel taskModel) async {
  //   await DbHelper.dbHelper.deleteTask(taskModel);
  //   getAllTasks();
  // }

  // updateTask(TaskModel taskModel) async {
  //   await DbHelper.dbHelper.updateTask(taskModel);
  //   getAllTasks();
  // }
}
