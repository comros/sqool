#include <iostream>

// 20.01.2023
using namespace std;

class CP
{
public:
    int n;
    char *p;

    static int nCount;
    CP()
    {
        cout << "Ctor1" << endl;
        nCount++;
    }

    CP(int _n)
    {
        cout << "Ctor2" << endl;
        nCount++;

        if(_n > 0)
        {
            n = _n;
            p = new char[n];
        }
    }

    ~CP()
    {
        cout << "Dtor '" << this << "' " ;
        if(p != NULL)
        {
            cout << "dodatkowo usuwa tablice: " << (int*)p;
            delete[] p;
        }
        cout << endl;
        nCount--;
    }

    CP(const CP& arg) // KONSTRUKTOR KOPIUJĄCY
    {
        cout << "Ctor copy" << endl;
        n = arg.n;
        if(arg.p != NULL)
        {
            if(p != NULL) delete[] p;
            p = new char[n];
            for(int i = 0; i < n; i++) p[i] = arg.p[i];
        }
    }

    // Przeciążenie operatora przypisania
    CP& operator=(const CP& arg) // & jest po to, aby nie robił kopii tylko pracował na orgnialnej zmiennej / Można dodać też const, aby na pewno to była jedna stała
    {
        cout << "operator = " << endl;
        if(this == &arg) return *this; // Sprawdza jeżeli obiekt po lewej jest równy temu po prawej
        n = arg.n;
        if(arg.p != NULL)
        {
            p = new char[n];
            for(int i = 0; i < n; i++) p[i] = arg.p[i];
        }
        return *this;
    }

};

int CP::nCount = 0;

int main()
{
    cout << CP::nCount << endl;

    {
        CP *p = NULL;
        CP A(20), B, C(10);
        A = B = C;

        A = A;

        cout << CP::nCount << endl;

    }
    cout << CP::nCount << endl;
}
