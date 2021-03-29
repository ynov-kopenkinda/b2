#include <QCoreApplication>
#include <QDebug>

int add(int a, int b) {
    return a + b;
}

int sub(int a, int b) {
    return a - b;
}

typedef int(*OperationFN)(int, int);

int main()
{
    int a = 10;
    int b = 20;

    OperationFN operation;
    QString operationName = "Addition";

    if (operationName == "Addition") {
        operation = &add;
    } else {
        operation = &sub;
    }

    qDebug() << operation(a, b);
    return 0;
}

/*
  function add(a, b) {return a+b}
  function sub(a, b) {return a+b}

  const operation = { exec: null }

  const operationName = "Addition";

  if (operationName == "Addition") {
    operation.exec = add;
  } else {
    operation.exec = sub;
  }

  const a = 10, b = 20;
  operation.exec(a, b);
*/
