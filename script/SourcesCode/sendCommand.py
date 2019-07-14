import win32gui
import win32con
import sys
WM_CHAR = 0x0102
input = ' '.join(sys.argv[1:])
title = str(input.split('|')[0])
if input.find('|')==int(-1):
    command = input.split('|')[0]
    title = None
else:
    command = input.split('|')[1]
def main(command):
    try:
        hWnd = win32gui.FindWindow('ConsoleWindowClass', title)
        assert hWnd
    except AssertionError:
        print('错误 未启动')
    else:
        for char in str(command):
            win32gui.SendMessage(hWnd, win32con.WM_CHAR, ord(char), None)
        win32gui.PostMessage(hWnd, win32con.WM_KEYDOWN, win32con.VK_RETURN, 0)
        #win32gui.PostMessage(hWnd, win32con.WM_KEYUP, win32con.VK_RETURN, 0)
        #for char in '\n':
        #    win32.user32.SendMessageW(hWnd, WM_KEYDOWN, ord(char), None)
main(command)