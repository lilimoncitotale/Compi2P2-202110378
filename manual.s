.section .data
newline: .string "\n"
num_buffer: .space 20

.section .text
.globl _start

suma:
    mov x0, #15
    ret

_start:
    stp x29, x30, [sp, #-32]!
    mov x29, sp
    
    mov x0, #10
    mov x1, #5
    bl suma
    
    // Imprimir x0
    mov x10, #10
    adrp x1, num_buffer
    add x1, x1, :lo12:num_buffer
    add x1, x1, #19
    mov x2, #0
    cmp x0, #0
    b.ne div2
    mov x2, #1
    mov w3, #'0'
    strb w3, [x1]
    b done
div2:
    mov x3, x0
loop1:
    cmp x3, #0
    b.eq done
    udiv x4, x3, x10
    msub x5, x4, x10, x3
    add x5, x5, #'0'
    strb w5, [x1]
    sub x1, x1, #1
    add x2, x2, #1
    mov x3, x4
    b loop1
done:
    add x1, x1, #1
    mov x0, #1
    mov x8, #64
    svc #0
    
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x2, #1
    mov x8, #64
    svc #0
    
    mov x0, #0
    mov x8, #93
    svc #0