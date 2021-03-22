#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QVector>
#include <contact.h>
#include <dbmanager.h>
#include <contactslist.h>

QT_BEGIN_NAMESPACE
namespace Ui { class ContactsApp; }
QT_END_NAMESPACE

class ContactsApp : public QMainWindow
{
    Q_OBJECT

public:
    ContactsApp(QWidget *parent = nullptr);
    ~ContactsApp();
private slots:
    void on_LoadContactListButton_clicked();

    void on_SearchLineInput_textChanged(const QString &arg1);

    void on_ContactsList_currentRowChanged(int currentRow);

    void on_AddContactButton_clicked();

    void on_UpdateOrSaveContactsButton_clicked();

    void on_ClearContactListButton_clicked();

    void on_SaveContactListButton_clicked();

    void on_DeleteContactButton_clicked();

private:
    /* Vars */
    Ui::ContactsApp *ui;
    ContactsDBManager *m_DB;
    ContactsList *m_Contacts;
    QString m_Search;
    int m_Selected;

    /* Methods */
    QString getFileName();
    bool isDBConnected();
    void changeDBmanager(ContactsDBManager *newManager);
    void renderList();
    void renderForm();
    Contact *getSelected();
};
#endif // MAINWINDOW_H
