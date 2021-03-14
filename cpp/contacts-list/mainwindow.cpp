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
    QVector<Contact*> loadedContacts = this->loadContactsFromFile(filename);
    m_LoadedContacts.clear();
    this->insertContacts(loadedContacts);
}

void MainWindow::on_MergeButton_clicked()
{
    QString filename = this->getFileName();
    QVector<Contact*> loadedContacts = this->loadContactsFromFile(filename);
    this->insertContacts(loadedContacts);
}

void MainWindow::renderContactsList()
{
    this->ui->ContactsList->clear();
    foreach (auto& contact, this->m_LoadedContacts) {
        if (!contact->matchesCriteria(this->m_SearchValue)) continue;
        QString stringRepresentation = contact->toString();
        this->ui->ContactsList->addItem(stringRepresentation);
    }
}

void MainWindow::renderForm()
{
    Contact* selectedContact = this->m_LoadedContacts.at(this->m_SelectedContact);
    this->ui->CommentaryInput->setText(selectedContact->Commentary());
    this->ui->EmailInput->setText(selectedContact->Email());
    this->ui->NameInput->setText(selectedContact->Name());
    this->ui->PhoneInput->setText(selectedContact->Phone());
}

void MainWindow::insertContacts(QVector<Contact*> toInsert)
{
    int loadedCount = 0;
    for(auto& contact: toInsert) {
        bool isPresent = false;
        for (auto& loadedContact: m_LoadedContacts) {
            if (loadedContact->toString() == contact->toString()) {
                isPresent = true;
            }
        }
        if (isPresent) {
            this->ui->Statusbar->showMessage(contact->Name() +" (" + contact->Email() + ") is already present, skipping.");
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

QVector<Contact*> MainWindow::loadContactsFromFile(QString filename)
{
    QVector<Contact*> contacts = QVector<Contact*>();
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
            Contact* newContact = new Contact(data.at(0), data.at(1), data.at(2), data.at(3));
            contacts.append(newContact);
        }
        contactFile.close();
    } else {
        QString error = "Cannot open file " + filename;
        qCritical() << error;
        this->ui->Statusbar->showMessage(error);
    }
    return contacts;
}

void MainWindow::saveContactsToFile(QString filename)
{
    QFile contactFile(filename);
    if (contactFile.open(QIODevice::WriteOnly | QIODevice::Text)) {
        QTextStream flux(&contactFile);
        for (auto& contact : m_LoadedContacts) {
            QString contactStr = contact->serialize();
            flux << contactStr << "\n";
        }
        contactFile.close();
        this->ui->Statusbar->showMessage(QString::number(m_LoadedContacts.length()) + " contacts saved");
    } else {
        QString error = "Cannot save to " + filename;
        qCritical() << error;
        this->ui->Statusbar->showMessage(error);
    }

}

void MainWindow::on_ContactsList_currentRowChanged(int currentRow)
{
    if (currentRow >= 0) {
        this->m_SelectedContact = currentRow;
    }
    this->renderForm();
}

void MainWindow::on_SaveContactButton_clicked()
{
    QString filename = this->getFileName();
    this->saveContactsToFile(filename);
}

void MainWindow::on_SearchBox_textChanged(const QString &arg1)
{
    this->m_SearchValue = arg1;
    this->renderContactsList();
}

void MainWindow::on_UpdateContactButton_clicked()
{
    Contact* selectedContact = this->m_LoadedContacts.at(this->m_SelectedContact);
    selectedContact->updateFields(
                this->ui->NameInput->text(),
                this->ui->EmailInput->text(),
                this->ui->PhoneInput->text(),
                this->ui->CommentaryInput->text()
                );
    this->renderContactsList();
    this->renderForm();
}

void MainWindow::on_AddNewButton_clicked()
{
    this->m_LoadedContacts.append(new Contact("NEW", "NEW","NEW" ,"NEW"));
    this->m_SelectedContact = this->m_LoadedContacts.length() - 1;
    this->renderContactsList();
    this->ui->ContactsList->setCurrentRow(this->m_SelectedContact);
    this->renderForm();
}
