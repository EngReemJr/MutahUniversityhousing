import 'package:flutter/material.dart';
import 'package:syncfusion_flutter_charts/charts.dart';

class ChartApp extends StatelessWidget {
  String title = '';
  ChartApp(this.title);
  @override
  Widget build(BuildContext context) {
    return
        // MaterialApp(
        // theme: ThemeData(primarySwatch: Colors.blue),
        //home:
        _MyHomePage(title);
  }
}

class _MyHomePage extends StatefulWidget {
  String title = '';
  _MyHomePage(this.title);
  // ignore: prefer_const_constructors_in_immutables
  // _MyHomePage({Key? key}) : super(key: key);

  @override
  _MyHomePageState createState() => _MyHomePageState(title);
}

class _MyHomePageState extends State<_MyHomePage> {
  late List<_ChartData> data;
  late TooltipBehavior _tooltip;
  late String title;
  _MyHomePageState(this.title);
  @override
  void initState() {
    data = [
      _ChartData('David', 25),
      _ChartData('Steve', 38),
      _ChartData('Jack', 34),
      _ChartData('Others', 52)
    ];
    _tooltip = TooltipBehavior(enable: true);
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    // return

    //   SfCircularChart(
    //         tooltipBehavior: _tooltip,
    //         series: <DoughnutSeries<_ChartData, String>>[
    //           DoughnutSeries<_ChartData, String>(
    //               dataSource: data,
    //               xValueMapper: (_ChartData data, _) => data.x,
    //               yValueMapper: (_ChartData data, _) => data.y,
    //               name: 'Gold')
    //         ]
    //     )
    //         ;
    // return Scaffold(
    //   body:
    return Center(
        child: Container(
            child: SfCircularChart(annotations: <CircularChartAnnotation>[
      CircularChartAnnotation(
          widget: Container(
              child: Text(title,
                  style: TextStyle(
                      color: Color.fromARGB(255, 91, 92, 87), fontSize: 12))))
    ], series: <CircularSeries>[
      DoughnutSeries<_ChartData, String>(
          dataSource: data,
          xValueMapper: (_ChartData data, _) => data.x,
          yValueMapper: (_ChartData data, _) => data.y,
          // Radius of doughnut's inner circle
          innerRadius: '60%')
    ])));
    // );
  }
}

class _ChartData {
  _ChartData(this.x, this.y);

  final String x;
  final double y;
}
