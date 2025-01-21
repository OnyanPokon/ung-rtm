<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class SatisfactionChart
{
    public function buildFacultyComparisonChart($facultyNames, $facultyTM, $facultyCM, $facultyM, $facultySM)
    {
        return (new LarapexChart)
            ->barChart() // Use the barChart method
            ->setXAxis($facultyNames)
            ->addData('TM', $facultyTM)
            ->addData('CM', $facultyCM)
            ->addData('M', $facultyM)
            ->addData('SM', $facultySM)
            ->setColors(['#FF0000', '#FFA500', '#008000', '#0000FF'])
            ->setGrid(false)
            ->setStacked(true) // Enable stacking
            ->setHeight(400);
    }

    public function buildProdiComparisonChart($prodiNames, $prodiTM, $prodiCM, $prodiM, $prodiSM)
    {
        return (new LarapexChart)
            ->barChart() // Use the barChart method
            ->setXAxis($prodiNames)
            ->addData('TM', $prodiTM)
            ->addData('CM', $prodiCM)
            ->addData('M', $prodiM)
            ->addData('SM', $prodiSM)
            ->setColors(['#FF0000', '#FFA500', '#008000', '#0000FF'])
            ->setGrid(false)
            ->setStacked(true) // Enable stacking
            ->setHeight(400);
    }
}
