#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    this->m_ContactList = new ContactList("contacts.txt");
}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_LoadContactsButton_clicked()
{
    this->m_ContactList->load();
}
