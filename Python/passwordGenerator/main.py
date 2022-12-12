import secrets
import string


class GetPassword:
    def __init__(self, password):
        self.password = password

    def __str__(self):
        return self.password


def generate(number, length):
    for _ in range(number):
        passwords = ''
        for _ in range(length):
            passwords += (secrets.choice(string.ascii_letters + string.digits + string.punctuation))
        print(GetPassword(passwords))


print('''
----------------------------------------------------------------------
|                                                                    |
|                   Welcome to Passwords Generator                   |
|                              made by                               |
|                          Billones, Steven                          |
|                           Sanguyo, Carl                            |
|                          Santiago, Rachel                          |
|                                                                    |
|_____________________________________________________________________
''')
while True:

    number_of_passwords = input('''
Enter the number of passwords to generate: ''')
    if number_of_passwords == 'quit':
        break
    else:
        number_of_passwords = int(number_of_passwords)

    length_of_passwords = input('''
Enter the length of the passwords you want to generate: ''')
    if length_of_passwords == 'quit':
        break
    else:
        length_of_passwords = int(length_of_passwords)

    print('''
Here are your passwords:
        ''')

    generate(number_of_passwords, length_of_passwords)

