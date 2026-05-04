.section .data
.align 4
newline: .string "\n"
num_buffer: .space 20
str_1: .string "=== INICIO DE CALIFICACION: ARREGLOS ==="
str_2: .string "\n--- 5.1 DECLARACION MULTIDIMENSIONAL ---"
str_3: .string "Matriz no inicializada [1][1]:"
str_4: .string " "
num5: .space 12
str_9: .string "Matriz inicializada [0][0]:"
num10: .space 12
str_14: .string "\n--- 5.2 ACCESO Y MODIFICACION MULTIDIMENSIONAL ---"
str_15: .string "Original matrizNoInit[0][1]:"
num16: .space 12
str_20: .string "Modificado matrizNoInit[0][1]:"
num21: .space 12
str_25: .string "\n=== FIN DE CALIFICACION: ARREGLOS ==="

.section .text

    // DEBUG: visitProgram called
    .globl _start

    .type _start, @function
_start:
    stp x29, x30, [sp, #-16]!
    mov x29, sp
    sub sp, sp, #512
    // DEBUG: visitAddition called for: fmt.Println("=== INICIO DE CALIFICACION: ARREGLOS ===")
    // DEBUG: visitMultiplication called for: fmt.Println("=== INICIO DE CALIFICACION: ARREGLOS ===")
    adrp x1, str_1
    add x1, x1, :lo12:str_1
    mov x0, #1
    mov x2, #40
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // DEBUG: visitAddition called for: fmt.Println("\n--- 5.1 DECLARACION MULTIDIMENSIONAL ---")
    // DEBUG: visitMultiplication called for: fmt.Println("\n--- 5.1 DECLARACION MULTIDIMENSIONAL ---")
    adrp x1, str_2
    add x1, x1, :lo12:str_2
    mov x0, #1
    mov x2, #41
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // INFO: Array multidimensional detectado: matrizNoInit [2,2] int32
    // Array 'matrizNoInit' en offset -32, dimensiones: [2,2]
    mov x0, #1
    str x0, [x29, #-64]
    mov x0, #2
    str x0, [x29, #-56]
    mov x0, #3
    str x0, [x29, #-56]
    mov x0, #4
    str x0, [x29, #-48]
    // DEBUG: visitAddition called for: fmt.Println("Matriz no inicializada [1][1]:",matrizNoInit[1][1])
    // DEBUG: visitMultiplication called for: fmt.Println("Matriz no inicializada [1][1]:",matrizNoInit[1][1])
    adrp x1, str_3
    add x1, x1, :lo12:str_3
    mov x0, #1
    mov x2, #30
    mov x8, #64
    svc #0
    adrp x1, str_4
    add x1, x1, :lo12:str_4
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG: visitAddition called for: matrizNoInit[1][1]
    // DEBUG: visitMultiplication called for: matrizNoInit[1][1]
    // DEBUG: Parsing array index expr: 1
    // DEBUG: Index is numeric: 1
    // DEBUG: Parsing array index expr: 1
    // DEBUG: Index is numeric: 1
    // DEBUG: visitArrayAccess called for matrizNoInit with indices: [1,1]
    // getArrayElementOffset: name=matrizNoInit, indices=[1,1]
    // arrayInfo[matrizNoInit] = {"offset":-32,"type":"array","elementType":"int32","dimensions":2,"sizes":[2,2],"totalElements":4}
    // Array offset calculado: linearIndex=3, offset=-8
    ldr x0, [x29, #-8]
    // DEBUG Expression: result = "x0_value"
    mov x10, #10
    adrp x1, num5
    add x1, x1, :lo12:num5
    add x1, x1, #11
    mov x2, #0
    cmp x0, #0
    b.ne div7
    mov x2, #1
    mov w3, #'0'
    strb w3, [x1]
    sub x1, x1, #1
    b done8
div7:
    mov x3, x0
loop6:
    cmp x3, #0
    b.eq done8
    udiv x4, x3, x10
    msub x5, x4, x10, x3
    add x5, x5, #'0'
    strb w5, [x1]
    sub x1, x1, #1
    add x2, x2, #1
    mov x3, x4
    b loop6
done8:
    add x1, x1, #1
    mov x0, #1
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // DEBUG: visitAddition called for: fmt.Println("Matriz inicializada [0][0]:",matrizInit[0][0])
    // DEBUG: visitMultiplication called for: fmt.Println("Matriz inicializada [0][0]:",matrizInit[0][0])
    adrp x1, str_9
    add x1, x1, :lo12:str_9
    mov x0, #1
    mov x2, #27
    mov x8, #64
    svc #0
    adrp x1, str_4
    add x1, x1, :lo12:str_4
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG: visitAddition called for: matrizInit[0][0]
    // DEBUG: visitMultiplication called for: matrizInit[0][0]
    // DEBUG: Parsing array index expr: 0
    // DEBUG: Index is numeric: 0
    // DEBUG: Parsing array index expr: 0
    // DEBUG: Index is numeric: 0
    // DEBUG: visitArrayAccess called for matrizInit with indices: [0,0]
    // getArrayElementOffset: name=matrizInit, indices=[0,0]
    // arrayInfo[matrizInit] = {"offset":-64,"type":"array","elementType":null,"dimensions":2,"sizes":[2,2],"totalElements":4}
    // Array offset calculado: linearIndex=0, offset=-64
    ldr x0, [x29, #-64]
    // DEBUG Expression: result = "x0_value"
    mov x10, #10
    adrp x1, num10
    add x1, x1, :lo12:num10
    add x1, x1, #11
    mov x2, #0
    cmp x0, #0
    b.ne div12
    mov x2, #1
    mov w3, #'0'
    strb w3, [x1]
    sub x1, x1, #1
    b done13
div12:
    mov x3, x0
loop11:
    cmp x3, #0
    b.eq done13
    udiv x4, x3, x10
    msub x5, x4, x10, x3
    add x5, x5, #'0'
    strb w5, [x1]
    sub x1, x1, #1
    add x2, x2, #1
    mov x3, x4
    b loop11
done13:
    add x1, x1, #1
    mov x0, #1
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // DEBUG: visitAddition called for: fmt.Println("\n--- 5.2 ACCESO Y MODIFICACION MULTIDIMENSIONAL ---")
    // DEBUG: visitMultiplication called for: fmt.Println("\n--- 5.2 ACCESO Y MODIFICACION MULTIDIMENSIONAL ---")
    adrp x1, str_14
    add x1, x1, :lo12:str_14
    mov x0, #1
    mov x2, #51
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // DEBUG: visitAddition called for: fmt.Println("Original matrizNoInit[0][1]:",matrizNoInit[0][1])
    // DEBUG: visitMultiplication called for: fmt.Println("Original matrizNoInit[0][1]:",matrizNoInit[0][1])
    adrp x1, str_15
    add x1, x1, :lo12:str_15
    mov x0, #1
    mov x2, #28
    mov x8, #64
    svc #0
    adrp x1, str_4
    add x1, x1, :lo12:str_4
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG: visitAddition called for: matrizNoInit[0][1]
    // DEBUG: visitMultiplication called for: matrizNoInit[0][1]
    // DEBUG: Parsing array index expr: 0
    // DEBUG: Index is numeric: 0
    // DEBUG: Parsing array index expr: 1
    // DEBUG: Index is numeric: 1
    // DEBUG: visitArrayAccess called for matrizNoInit with indices: [0,1]
    // getArrayElementOffset: name=matrizNoInit, indices=[0,1]
    // arrayInfo[matrizNoInit] = {"offset":-32,"type":"array","elementType":"int32","dimensions":2,"sizes":[2,2],"totalElements":4}
    // Array offset calculado: linearIndex=1, offset=-24
    ldr x0, [x29, #-24]
    // DEBUG Expression: result = "x0_value"
    mov x10, #10
    adrp x1, num16
    add x1, x1, :lo12:num16
    add x1, x1, #11
    mov x2, #0
    cmp x0, #0
    b.ne div18
    mov x2, #1
    mov w3, #'0'
    strb w3, [x1]
    sub x1, x1, #1
    b done19
div18:
    mov x3, x0
loop17:
    cmp x3, #0
    b.eq done19
    udiv x4, x3, x10
    msub x5, x4, x10, x3
    add x5, x5, #'0'
    strb w5, [x1]
    sub x1, x1, #1
    add x2, x2, #1
    mov x3, x4
    b loop17
done19:
    add x1, x1, #1
    mov x0, #1
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // DEBUG: visitAddition called for: 77
    // DEBUG: visitMultiplication called for: 77
    mov x0, #77
    // DEBUG Expression: result = 77
    mov x0, #77
    // getArrayElementOffset: name=matrizNoInit, indices=[0,1]
    // arrayInfo[matrizNoInit] = {"offset":-32,"type":"array","elementType":"int32","dimensions":2,"sizes":[2,2],"totalElements":4}
    // Array offset calculado: linearIndex=1, offset=-24
    str x0, [x29, #-24]
    // DEBUG: visitAddition called for: fmt.Println("Modificado matrizNoInit[0][1]:",matrizNoInit[0][1])
    // DEBUG: visitMultiplication called for: fmt.Println("Modificado matrizNoInit[0][1]:",matrizNoInit[0][1])
    adrp x1, str_20
    add x1, x1, :lo12:str_20
    mov x0, #1
    mov x2, #30
    mov x8, #64
    svc #0
    adrp x1, str_4
    add x1, x1, :lo12:str_4
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG: visitAddition called for: matrizNoInit[0][1]
    // DEBUG: visitMultiplication called for: matrizNoInit[0][1]
    // DEBUG: Parsing array index expr: 0
    // DEBUG: Index is numeric: 0
    // DEBUG: Parsing array index expr: 1
    // DEBUG: Index is numeric: 1
    // DEBUG: visitArrayAccess called for matrizNoInit with indices: [0,1]
    // getArrayElementOffset: name=matrizNoInit, indices=[0,1]
    // arrayInfo[matrizNoInit] = {"offset":-32,"type":"array","elementType":"int32","dimensions":2,"sizes":[2,2],"totalElements":4}
    // Array offset calculado: linearIndex=1, offset=-24
    ldr x0, [x29, #-24]
    // DEBUG Expression: result = "x0_value"
    mov x10, #10
    adrp x1, num21
    add x1, x1, :lo12:num21
    add x1, x1, #11
    mov x2, #0
    cmp x0, #0
    b.ne div23
    mov x2, #1
    mov w3, #'0'
    strb w3, [x1]
    sub x1, x1, #1
    b done24
div23:
    mov x3, x0
loop22:
    cmp x3, #0
    b.eq done24
    udiv x4, x3, x10
    msub x5, x4, x10, x3
    add x5, x5, #'0'
    strb w5, [x1]
    sub x1, x1, #1
    add x2, x2, #1
    mov x3, x4
    b loop22
done24:
    add x1, x1, #1
    mov x0, #1
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // DEBUG: visitAddition called for: fmt.Println("\n=== FIN DE CALIFICACION: ARREGLOS ===")
    // DEBUG: visitMultiplication called for: fmt.Println("\n=== FIN DE CALIFICACION: ARREGLOS ===")
    adrp x1, str_25
    add x1, x1, :lo12:str_25
    mov x0, #1
    mov x2, #38
    mov x8, #64
    svc #0
    adrp x1, newline
    add x1, x1, :lo12:newline
    mov x0, #1
    mov x2, #1
    mov x8, #64
    svc #0
    // DEBUG Expression: result = null
    // Exit syscall
    mov x0, #0
    mov x8, #93
    svc #0
_start_return0:
    add sp, sp, #512
    ldp x29, x30, [sp], #16
    ret