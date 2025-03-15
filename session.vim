let SessionLoad = 1
let s:so_save = &g:so | let s:siso_save = &g:siso | setg so=0 siso=0 | setl so=-1 siso=-1
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd ~/midterm_oop
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
let s:shortmess_save = &shortmess
if &shortmess =~ 'A'
  set shortmess=aoOA
else
  set shortmess=aoO
endif
badd +41 term://~/midterm_oop//14560:C:/Windows/system32/cmd.exe
badd +42 ~/midterm_oop/index.php
badd +145 styles/global.css
argglobal
%argdel
tabnew +setlocal\ bufhidden=wipe
tabrewind
argglobal
if bufexists(fnamemodify("term://~/midterm_oop//14560:C:/Windows/system32/cmd.exe", ":p")) | buffer term://~/midterm_oop//14560:C:/Windows/system32/cmd.exe | else | edit term://~/midterm_oop//14560:C:/Windows/system32/cmd.exe | endif
if &buftype ==# 'terminal'
  silent file term://~/midterm_oop//14560:C:/Windows/system32/cmd.exe
endif
balt ~/midterm_oop/index.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
let s:l = 41 - ((40 * winheight(0) + 32) / 64)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 41
normal! 0
tabnext
edit ~/midterm_oop/index.php
let s:save_splitbelow = &splitbelow
let s:save_splitright = &splitright
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
let &splitbelow = s:save_splitbelow
let &splitright = s:save_splitright
wincmd t
let s:save_winminheight = &winminheight
let s:save_winminwidth = &winminwidth
set winminheight=0
set winheight=1
set winminwidth=0
set winwidth=1
exe 'vert 1resize ' . ((&columns * 118 + 118) / 237)
exe 'vert 2resize ' . ((&columns * 118 + 118) / 237)
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
7,11fold
18,21fold
17,23fold
15,24fold
28,33fold
36,37fold
35,38fold
27,39fold
44,46fold
53,55fold
51,56fold
58,60fold
62,64fold
66,68fold
70,72fold
74,76fold
78,80fold
82,84fold
86,88fold
49,89fold
92,93fold
95,96fold
91,97fold
43,98fold
42,99fold
14,100fold
116,121fold
110,123fold
105,124fold
let &fdl = &fdl
let s:l = 42 - ((1 * winheight(0) + 31) / 63)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 42
normal! 027|
wincmd w
argglobal
if bufexists(fnamemodify("styles/global.css", ":p")) | buffer styles/global.css | else | edit styles/global.css | endif
if &buftype ==# 'terminal'
  silent file styles/global.css
endif
balt ~/midterm_oop/index.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
3,9fold
12,17fold
20,28fold
31,34fold
37,40fold
44,46fold
49,57fold
60,64fold
68,70fold
73,78fold
81,87fold
90,91fold
94,97fold
100,102fold
105,106fold
109,112fold
115,121fold
124,127fold
130,138fold
141,149fold
152,155fold
158,161fold
164,167fold
170,172fold
175,176fold
179,182fold
let &fdl = &fdl
let s:l = 145 - ((25 * winheight(0) + 31) / 63)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 145
normal! 015|
wincmd w
2wincmd w
exe 'vert 1resize ' . ((&columns * 118 + 118) / 237)
exe 'vert 2resize ' . ((&columns * 118 + 118) / 237)
tabnext 2
if exists('s:wipebuf') && len(win_findbuf(s:wipebuf)) == 0 && getbufvar(s:wipebuf, '&buftype') isnot# 'terminal'
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20
let &shortmess = s:shortmess_save
let &winminheight = s:save_winminheight
let &winminwidth = s:save_winminwidth
let s:sx = expand("<sfile>:p:r")."x.vim"
if filereadable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &g:so = s:so_save | let &g:siso = s:siso_save
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
