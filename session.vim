let SessionLoad = 1
let s:so_save = &g:so | let s:siso_save = &g:siso | setg so=0 siso=0 | setl so=-1 siso=-1
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd ~/code/activity-php/midterm_oop
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
let s:shortmess_save = &shortmess
if &shortmess =~ 'A'
  set shortmess=aoOA
else
  set shortmess=aoO
endif
badd +221 index.php
badd +110 scripts/modules/popup.js
badd +26 scripts/modules/form.js
badd +48 scripts/modules/api.js
badd +128 api/users.php
argglobal
%argdel
edit scripts/modules/api.js
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
exe 'vert 1resize ' . ((&columns * 129 + 141) / 283)
exe 'vert 2resize ' . ((&columns * 153 + 141) / 283)
argglobal
balt index.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
4,6fold
4,7fold
9,15fold
1,16fold
22,24fold
22,25fold
27,32fold
19,33fold
39,40fold
37,42fold
37,43fold
45,50fold
36,51fold
55,57fold
54,59fold
63,65fold
71,76fold
70,77fold
82,85fold
82,86fold
90,113fold
115,116fold
80,119fold
80,120fold
122,126fold
62,133fold
let &fdl = &fdl
let s:l = 48 - ((46 * winheight(0) + 37) / 75)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 48
normal! 05|
wincmd w
argglobal
if bufexists(fnamemodify("api/users.php", ":p")) | buffer api/users.php | else | edit api/users.php | endif
if &buftype ==# 'terminal'
  silent file api/users.php
endif
balt index.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
21,22fold
32,34fold
8,38fold
42,43fold
51,52fold
53,54fold
39,55fold
58,72fold
84,85fold
86,87fold
98,99fold
100,101fold
107,109fold
119,120fold
121,122fold
79,125fold
134,136fold
145,146fold
147,148fold
137,149fold
150,151fold
161,162fold
163,164fold
126,167fold
78,168fold
181,182fold
185,186fold
191,192fold
196,197fold
203,204fold
209,210fold
211,212fold
172,213fold
let &fdl = &fdl
let s:l = 128 - ((42 * winheight(0) + 37) / 75)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 128
normal! 031|
wincmd w
exe 'vert 1resize ' . ((&columns * 129 + 141) / 283)
exe 'vert 2resize ' . ((&columns * 153 + 141) / 283)
tabnext 1
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
