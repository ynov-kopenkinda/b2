// ? TP Students

#include <iostream>
#include <string>
#include <vector>
#include <map>

#define GET_LINE_NAME_SIZE 256
#define GET_LINE_NOTE_SIZE 5

float getMoy(std::vector<int> notes) {
    float gnote = 0;
    for (int note: notes) {
        gnote += note;
    }
    return gnote / notes.size();
}


std::string getList(std::vector<int> notes) {
    std::string gnotes;
    for (int note: notes) {
        gnotes += std::to_string(note) + " ";
    }
    return gnotes;
}

void print(std::string s, bool endl = true) {
    std::cout << s;
    if (endl) {
        std::cout << std::endl;
    }
}

void print(float s, bool endl = true) {
    std::cout << s;
    if (endl) {
        std::cout << std::endl;
    }
}

int main()
{
    std::map<std::string, std::vector<int>> students;
    char name[GET_LINE_NAME_SIZE];
    do {
        print("enter student's name");
        std::cin.getline(name, 10);
        if (std::string(name).size() == 0) {
            break;
        }
        std::vector<int> notes;
        print("Editing notes for student: ", false);
        print(name);
        do {
            try {
                char note[GET_LINE_NOTE_SIZE];
                std::cin.getline(note, GET_LINE_NOTE_SIZE);
                notes.push_back(std::stoi(note));
            }  catch (std::invalid_argument e) {
                break;
            }
        } while (1);
        students[name] = notes;
    } while (1);
    for(const std::pair<std::string, std::vector<int>> student : students) {
        print(student.first, false);
        print(": ", false);
        print(getList(student.second));
        print("Moyenne: ", false);
        print(getMoy(student.second));
    }
}
