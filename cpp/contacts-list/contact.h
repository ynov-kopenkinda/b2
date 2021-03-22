#ifndef CONTACT_H
#define CONTACT_H

#include <QString>

class Contact
{
    QString m_Name;
    QString m_Surname;
    QString m_Email;
    QString m_Phone;
    QString m_Commentary;

public:
    Contact();
    Contact(
        const QString &name,
        const QString &surname,
        const QString &email,
        const QString &phone,
        const QString &commentary
    );

    /* Getters */
    QString Name() const;
    QString Surname() const;
    QString Email() const;
    QString Phone() const;
    QString Commentary() const;

    /* Setters */
    void setName(const QString &Name);
    void setSurname(const QString &Surname);
    void setEmail(const QString &Email);
    void setPhone(const QString &Phone);
    void setCommentary(const QString &Commentary);

    bool isSame(Contact *toCompare);
    bool matches(const QString &to);
    const QString toString();
};

#endif // CONTACT_H
