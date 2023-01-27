#include <iostream>
#include <cctype>

using namespace std;

int main()
{
    string input = "";

    cout << "Podaj slowo: ";
    cin >> input;

    string oldInput = input;

    // Zamienia wszystkie litery na małe
    for(int l = 0; l < input.length(); l++) input[l] = tolower(input[l]);
    string invertedInput = input;

    // Przypisuje odwróconego stringa do zmiennej
    for(int i = 0; i < invertedInput.length(); i++) invertedInput[i] = invertedInput[invertedInput.length()-1-i];

    if(input == invertedInput) cout << oldInput << " to palindrom";
    else cout << oldInput << " to nie palindrom";

    return 0;
}
