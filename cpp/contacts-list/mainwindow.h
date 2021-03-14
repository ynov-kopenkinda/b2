#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QVector>
#include <contact.h>

QT_BEGIN_NAMESPACE
namespace Ui { class MainWindow; }
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr);
    ~MainWindow();

private slots:
    void on_LoadContactsButton_clicked();
    void on_MergeButton_clicked();

    void on_ContactsList_currentRowChanged(int currentRow);

    void on_SaveContactButton_clicked();

    void on_SearchBox_textChanged(const QString &arg1);

    void on_UpdateContactButton_clicked();

    void on_AddNewButton_clicked();

private:
    Ui::MainWindow *ui;
    QVector<Contact*> m_LoadedContacts;
    int m_SelectedContact;
    QString m_SearchValue;

    void renderContactsList();
    void renderForm();
    void insertContacts(QVector<Contact*> toInsert);
    QString getFileName();
    QVector<Contact*> loadContactsFromFile(QString filename);
    void saveContactsToFile(QString filename);
};
#endif // MAINWINDOW_H
