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

private:
    Ui::MainWindow *ui;
    QVector<Contact> m_LoadedContacts;
    int m_SelectedContact;

    void renderContactsList();
    void renderForm();
    void insertContacts(QVector<Contact> toInsert);
    QString getFileName();
    QVector<Contact> loadContactsFromFile(QString filename);
};
#endif // MAINWINDOW_H
