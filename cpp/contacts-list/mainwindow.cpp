#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QFile>
#include <QTextStream>
#include <QFileDialog>
#include <QDebug>


MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_LoadContactsButton_clicked()
{
    QString filename = this->getFileName();
    QVector<Contact> loadedContacts = this->loadContactsFromFile(filename);
    m_LoadedContacts.clear();
    this->insertContacts(loadedContacts);
}

void MainWindow::on_MergeButton_clicked()
{
    QString filename = this->getFileName();
    QVector<Contact> loadedContacts = this->loadContactsFromFile(filename);
    this->insertContacts(loadedContacts);
}

void MainWindow::renderContactsList()
{
    this->ui->ContactsList->clear();
    foreach (auto& contact, this->m_LoadedContacts) {
        QString stringRepresentation = contact.toString();
        this->ui->ContactsList->addItem(stringRepresentation);
    }
}

void MainWindow::renderForm()
{

}

void MainWindow::insertContacts(QVector<Contact> toInsert)
{
    int loadedCount = 0;
    for(auto& contact: toInsert) {
        if (this->m_LoadedContacts.contains(contact)) {
            this->ui->Statusbar->showMessage(contact.toString() + " is already present, skipping.");
            continue;
        }
        this->m_LoadedContacts.append(contact);
        loadedCount += 1;
    }
    this->renderContactsList();
    if (loadedCount > 0) {
        this->ui->Statusbar->showMessage("Loaded " + QString::number(loadedCount)+ " contacts.");
    }
}

QString MainWindow::getFileName()
{
    return QFileDialog::getOpenFileName(this);
}

QVector<Contact> MainWindow::loadContactsFromFile(QString filename)
{
    QVector<Contact>* contacts = new QVector<Contact>();
    QFile contactFile(filename);
    if (contactFile.open(QIODevice::ReadWrite | QIODevice::Text)){
        QTextStream flux(&contactFile);
        QString all = flux.readAll();
        qDebug() << all;
        QStringList lines(all.split("\n"));
        for (const auto &line : qAsConst(lines)) {
            if(line.isEmpty()) {
                continue;
            }
            QStringList data = line.split("|");
            Contact* newContact = new Contact(data.at(0), data.at(1));
            contacts->append(*newContact);
        }
        contactFile.close();
    } else {
        QString error = "Cannot open file " + filename;
        qCritical() << error;
        this->ui->Statusbar->showMessage(error);
    }
    return *contacts;
}

void MainWindow::on_ContactsList_currentRowChanged(int currentRow)
{
    if (currentRow >= 0) {
        this->m_SelectedContact = currentRow;
    }
}
