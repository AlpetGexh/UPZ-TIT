package Detyra;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class ReadLine {
    public static String readLineOfFile(String filePath, int lineNumber) throws Exception {
        String line = null;

        if (lineNumber <= 0) {
            throw new Exception("Line of number must be 0 < n.");
        }

        try {
            BufferedReader reader = new BufferedReader(new FileReader(filePath));

            int currentLine = 1;
            while ((line = reader.readLine()) != null) {
                if (currentLine == lineNumber)
                    break;


                currentLine++;
            }

            if (line == null) {
                throw new Exception(String.format("Line number %d does not exist.", lineNumber));
            }

        } catch (IOException e) {
            e.getMessage();
        }


        return line;
    }

    public static String readLastLineOfFile(String filePath) throws Exception {
        return readLineOfFile(filePath, 0);
    }


    public static void main(String[] args) {
        String filePath = "input.txt";

        try {
            String lastLine = readLastLineOfFile(filePath);

            String res = readLineOfFile(filePath, 1);
            System.out.println(res);

            System.out.println("Last line of the file: " + lastLine);

        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }
}
