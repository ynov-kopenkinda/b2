#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "iostream"

void print(std::string t) {
    std::cout << t << std::endl;
}

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    ui->PogRessBar->setValue(0);
}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_Minus_clicked()
{
    int value = ui->PogRessBar->value();
    if (value > 0) {
        ui->PogRessBar->setValue(value - 1);
    }
}

void MainWindow::on_Plus_clicked()
{
    int value = ui->PogRessBar->value();
    if (value < 100) {
        ui->PogRessBar->setValue(value + 1);
    }
}
