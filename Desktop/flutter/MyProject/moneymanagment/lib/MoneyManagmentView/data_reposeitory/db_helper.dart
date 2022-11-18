import 'dart:io';

import 'package:path_provider/path_provider.dart';
import 'package:sqflite/sqflite.dart';
import 'package:sqflite/sqlite_api.dart';

class DbHelper {
  late Database database;
  static DbHelper dbHelper = DbHelper();

  final String tableName = "tasks";
  final String idColumnName = "id";
  final String titleColumnName = "title";
  final String isCompleteColumnName = "isComplete";
  initDatabase() async {
    database = await createDatabaseConnection();
  }

  Future<Database> createDatabaseConnection() async {
    Directory directory = await getApplicationDocumentsDirectory();
    String folderPath = directory.path;

    return openDatabase('$folderPath/money.db', version: 1,
        onCreate: (db, version) {
      try {
        db.execute('''CREATE TABLE balance(
            account_ID INTEGER PRIMARY KEY AUTOINCREMENT, 
            total Double, 
            currency INTEGER);
            Create Table expense (
expense_ID INTEGER PRIMARY KEY AUTOINCREMENT,
expense_Amount Double,
Categoery TEXT,
date DATE,
comment TEXT,
account_ID INTEGER references balance
);
            Create Table income (
income_ID INTEGER PRIMARY KEY AUTOINCREMENT,
income_Amount Double,
categoery TEXT,
date DATE,
comment TEXT,
account_ID INTEGER references balance, 
)
            
            ''');
      } catch (e) {
        print(e);
      }
    });
  }
/*
  Future<int> insertNewTask(TaskModel taskModel) async {
    int i = await database.insert(tableName, taskModel.toMap());
    return i;
  }

  Future<List<TaskModel>> getAllTasks() async {
    List<Map<String, dynamic>> data = await database.query(tableName);
    return data.map((e) => TaskModel.fromMap(e)).toList();
  }

  Future<int> deleteTask(TaskModel taskModel) async {
    int count = await database
        .delete(tableName, where: 'id=?', whereArgs: [taskModel.id]);
    return count;
  }

  updateTask(TaskModel taskModel) async {
    bool newValue = !(taskModel.isComplete!);
    database.update(tableName, {isCompleteColumnName: newValue},
        where: 'id=?', whereArgs: [taskModel.id]);
  }
  */
}
