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
badd +104 index.php
badd +1 scripts/modules/popup.js
badd +2 scripts/modules/form.js
argglobal
%argdel
edit index.php
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
exe 'vert 1resize ' . ((&columns * 158 + 159) / 318)
exe 'vert 2resize ' . ((&columns * 159 + 159) / 318)
argglobal
balt scripts/modules/form.js
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
4,8fold
15,18fold
14,20fold
12,21fold
25,31fold
34,35fold
33,36fold
24,37fold
45,50fold
44,51fold
53,55fold
43,56fold
67,69fold
65,70fold
72,74fold
76,78fold
80,82fold
86,90fold
84,91fold
93,95fold
97,99fold
101,103fold
105,107fold
63,108fold
114,118fold
113,119fold
112,121fold
123,125fold
132,135fold
131,136fold
129,137fold
127,138fold
140,142fold
149,153fold
148,154fold
156,157fold
146,158fold
144,159fold
111,160fold
61,161fold
166,167fold
169,170fold
165,171fold
41,172fold
40,174fold
179,183fold
178,185fold
189,195fold
188,197fold
177,198fold
206,210fold
205,211fold
213,215fold
204,216fold
223,225fold
227,229fold
222,230fold
236,240fold
235,241fold
234,243fold
247,249fold
245,250fold
252,254fold
256,258fold
260,262fold
266,270fold
264,271fold
273,275fold
277,279fold
281,283fold
285,287fold
233,288fold
294,298fold
293,299fold
292,301fold
303,305fold
312,315fold
311,316fold
309,317fold
307,318fold
320,322fold
329,333fold
328,334fold
336,337fold
326,338fold
324,339fold
291,340fold
221,341fold
346,347fold
349,350fold
345,351fold
202,352fold
201,354fold
11,363fold
let &fdl = &fdl
let s:l = 104 - ((0 * winheight(0) + 43) / 86)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 104
normal! 016|
wincmd w
argglobal
if bufexists(fnamemodify("scripts/modules/popup.js", ":p")) | buffer scripts/modules/popup.js | else | edit scripts/modules/popup.js | endif
if &buftype ==# 'terminal'
  silent file scripts/modules/popup.js
endif
balt scripts/modules/form.js
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
16,19fold
21,24fold
15,26fold
29,30fold
28,31fold
28,32fold
43,48fold
43,49fold
34,49fold
55,58fold
55,59fold
61,62fold
61,63fold
52,63fold
66,67fold
70,71fold
91,94fold
91,95fold
77,95fold
103,104fold
103,105fold
98,105fold
108,113fold
let &fdl = &fdl
let s:l = 9 - ((8 * winheight(0) + 43) / 86)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 9
normal! 0
wincmd w
exe 'vert 1resize ' . ((&columns * 158 + 159) / 318)
exe 'vert 2resize ' . ((&columns * 159 + 159) / 318)
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
