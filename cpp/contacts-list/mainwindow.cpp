#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QFile>
#include <QTextStream>
#include <QFileDialog>
#include <QDebug>
#include <notifier.h>


ContactsApp::ContactsApp(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::ContactsApp),
      m_DB(new ContactsDBManager()),
      m_Contacts(new ContactsList())
{
    ui->setupUi(this);
    Notifier::setStatusbar(this->ui->Statusbar);
}

ContactsApp::~ContactsApp()
{
    delete ui;
}

QString ContactsApp::getFileName()
{
    return QFileDialog::getOpenFileName(this);
}

void ContactsApp::renderList()
{
    auto contacts = this->m_Contacts->getAll(this->m_Search);
    this->ui->ContactsList->clear();
    for (auto contact: qAsConst(contacts)) {
        this->ui->ContactsList->addItem(contact->toString());
    }
    this->ui->ContactsList->setCurrentRow(this->m_Selected);
    this->renderForm();
}

void ContactsApp::renderForm()
{
    auto selectedContact = this->getSelected();
    if (selectedContact != nullptr) {
        this->ui->EmailInput->setText(selectedContact->Email());
        this->ui->NameInput->setText(selectedContact->Name());
        this->ui->SurnameInput->setText(selectedContact->Surname());
        this->ui->PhoneInput->setText(selectedContact->Phone());
        this->ui->CommentaryTextarea->setText(selectedContact->Commentary());
    }
}

Contact *ContactsApp::getSelected()
{
    auto selectedContact = this->m_Contacts->get(this->m_Selected);
    return selectedContact;
}

void ContactsApp::on_LoadContactListButton_clicked()
{
    QString filename = this->getFileName();
    if (!filename.endsWith(".db")) {
        Notifier::notify("Error: You need to load a file that ends with .db");
    } else {
        this->m_DB->changePath(filename);
        QVector<Contact *> loadedContacts = this->m_DB->getAll();
        if (this->m_Contacts->getAll("").size() == 0) {
            loadedContacts = this->m_DB->mockDB();
        }
        for (auto contact : qAsConst(loadedContacts)) {
            this->m_Contacts->addContact(contact);
        }
        this->renderList();
        Notifier::notify("Loaded " + QString::number(loadedContacts.length()) + " contacts.");
    }
}

void ContactsApp::on_SearchLineInput_textChanged(const QString &arg1)
{
    this->m_Search = arg1;
    this->renderList();
}

void ContactsApp::on_ContactsList_currentRowChanged(int currentRow)
{
    if (currentRow >= 0) {
        this->m_Selected = currentRow;
        this->renderForm();
    }
}

void ContactsApp::on_AddContactButton_clicked()
{
    this->m_Contacts->addContact(new Contact("NEW","CONTACT","PLEASE","EDIT",""));
    this->m_Search = "";
    this->ui->SearchLineInput->setText("");
    this->m_Selected = this->m_Contacts->lastIndex();
    this->renderList();
}

void ContactsApp::on_UpdateOrSaveContactsButton_clicked()
{
    auto selectedContact = this->getSelected();
    if (selectedContact != nullptr) {
        selectedContact->setName(this->ui->NameInput->text());
        selectedContact->setSurname(this->ui->SurnameInput->text());
        selectedContact->setEmail(this->ui->EmailInput->text());
        selectedContact->setPhone(this->ui->PhoneInput->text());
        selectedContact->setCommentary(this->ui->CommentaryTextarea->toHtml());
    }
    this->renderList();
}

void ContactsApp::on_ClearContactListButton_clicked()
{
    this->m_Contacts->clear();
    this->renderList();
}

void ContactsApp::on_SaveContactListButton_clicked()
{
    QString filename = this->getFileName();
    this->m_DB->changePath(filename);
    this->m_DB->bulkUpdate(this->m_Contacts->getAll(""));
}

void ContactsApp::on_DeleteContactButton_clicked()
{
    if (this->m_Selected >= 0 && this->m_Selected <= this->m_Contacts->lastIndex()) {
        this->m_Contacts->removeContact(this->m_Selected);
        this->renderList();
    }
}
